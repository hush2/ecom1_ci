<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

    public $page_title = 'Register';

    public function index()
    {
        if ($this->is_post() AND $this->form_validation->run('register') !== FALSE)
        {
            if ($this->user->add($this->input->post()))
            {
                $this->session->set_flashdata('success', TRUE);
                redirect('register');
            }
            show_error('You could not be registered due to a system error. We apologize for any inconvenience.');
        }
        return $this->load_view('account/register');
    }
}
