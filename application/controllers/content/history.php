<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends MY_Controller
{
    public $page_title = 'Your Viewing History';

    public function index()
    {
        $this->load->model('history_model');

        $data['pages'] = $this->history_model->page_all();
        $data['pdfs']  = $this->history_model->pdf_all();

        $this->load_view('content/history', $data);
    }
}