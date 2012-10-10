<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdfs extends MY_Controller
{
    public $page_title = 'PDFs';

    public function index()
    {
        $this->load->model('pdf_model');

        $data['titles'] = $this->pdf_model->all();
        $this->load_view('content/pdfs', $data);
    }
}
