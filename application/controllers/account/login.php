<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function index()
    {
        if ($this->is_post() AND $this->form_validation->run('login') === TRUE)
        {
            $email = $this->input->post('login_email');
            $password = $this->input->post('login_password');

            if ($user = $this->user->verify($email, $password))
            {
                $this->session->set_userdata($user);
                redirect(base_url());
            }
            $data['failed'] = TRUE;
        }
        $this->load->model('history_model');

        $data['popular'] = $this->history_model->popular();
        $this->load_view('home', $data);
    }
}
