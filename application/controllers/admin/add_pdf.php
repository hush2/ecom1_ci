<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_Pdf extends Admin_Controller
{
    public $page_title = 'Add a PDF';

    public function index()
    {
        $data = array();

        if ($this->is_post() AND $this->form_validation->run('add_pdf') === TRUE)
        {
            $settings = array(
                'upload_path'   => PDF_PATH,
                'allowed_types' => 'pdf',
                'max_size'	    => '1024',
                'encrypt_name'  => TRUE,
            );

            $this->load->library('upload', $settings);

            if ($this->upload->do_upload('pdf'))
            {
                $pdf  = $this->upload->data();
                $post = $this->input->post();

                $this->load->model('pdf_model');

                if ($this->pdf_model->add($pdf, $post))
                {
                    $this->session->set_flashdata('success', TRUE);
                    redirect('add_pdf');
                }
                show_error('The PDF could not be added due to a system error. We apologize for any inconvenience.');
            }
            $data['failed'] = $this->upload->display_errors("<span class='error'>", "</span>");
        }
        $this->load_view('admin/add_pdf', $data);
    }
}
