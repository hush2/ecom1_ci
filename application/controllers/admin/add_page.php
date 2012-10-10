<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_Page extends Admin_Controller
{
    public $page_title = 'Add a Site Content Page';

    public function index()
    {
        if ($this->is_post() AND $this->form_validation->run('add_page') === TRUE)
        {
            $this->load->model('page_model');

            if ($this->page_model->add($this->input->post()))
            {
                $this->session->set_flashdata('success', TRUE);
                redirect('add_page');
            }
            show_error('The page could not be added due to a system error. We apologize for any inconvenience.');
        }
        $this->load_view('admin/add_page');
    }
}