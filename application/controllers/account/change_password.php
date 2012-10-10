<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_Password extends MY_Controller
{
    public $page_title = 'Change Your Password';

    public function index()
    {
        if ($this->is_post() AND $this->form_validation->run('change_password') === TRUE)
        {
            if ($this->user->password_update($this->input->post('new_password')))
            {
                $this->session->set_flashdata('success', TRUE);
                redirect('change_password');
            }
            show_error('Your password could not be changed due to a system error. We apologize for any inconvenience.');
        }
        $this->load_view('account/change_password');
    }
}
