<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_Pdf extends MY_Controller
{
    public function index($pdf_name)
    {
        $this->load->model('pdf_model');

        if ($pdf = $this->pdf_model->find($pdf_name))
        {
            $user_id = $this->session->userdata('id');
            $is_expired = $this->session->userdata('is_expired');

            // Let guests and expired users view the description only.
            if ( ! $user_id OR $is_expired)
            {
                $this->page_title = $pdf->title;
                $data['description'] = $pdf->description;
                return $this->load_view('content/view_pdf', $data);
            }
            // Add to 'Your Viewing History'.
            $this->load->model('history_model', 'history');
            $this->history->add_pdf($pdf->id);

            $this->load->helper('download');

            $pdf_file = PDF_PATH . "{$pdf_name}.pdf";
            if (file_exists($pdf_file) AND is_file($pdf_file))
            {
                // CI will handle the proper headers.
                return force_download($pdf->file_name, file_get_contents($pdf_file));
            }
        }
        show_error(ERROR_ACCESS);
    }
}