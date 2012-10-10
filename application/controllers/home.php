<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index()
    {
        $this->load->model('history_model', 'history');

        $data['popular'] = $this->history->popular();
        $this->load_view('home', $data);
    }

    public function about()
    {
        $this->page_title = 'About';
        $this->load_view('about');
    }

    public function contact()
    {
        $this->page_title = 'Contact';
        $this->load_view('contact');
    }
}
