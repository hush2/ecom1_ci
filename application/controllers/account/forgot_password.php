<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_Password extends MY_Controller
{
    public $page_title = 'Forgot Password?';

    public function index()
    {
        if ($this->is_post() AND $this->form_validation->run('forgot_password') === TRUE)
        {
            if ($this->user->new_password($this->input->post('email')))
            {
                //$message= "Your password to log into <whatever site> has been temporarily changed to '$password'. Please log in using that password and this email address. Then you may change your password to something more familiar.";
                //mail ($this->input->post('email'), 'Your temporary password.', $message, 'From: admin@example.com');

                $this->session->set_flashdata('success', TRUE);
                redirect('forgot_password');
            }
            show_error('Your password could not be changed due to a system error. We apologize for any inconvenience.');
        }
        $this->load_view('account/forgot_password');
    }
}
