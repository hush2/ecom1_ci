<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller
{
    public function index()
    {
        $user = array('id'          => NULL,
                      'type'        => NULL,
                      'is_expired'  => NULL,
        );
        // We don't want to destroy the session because we need flashdata.
        $this->session->unset_userdata($user);

        $this->session->set_flashdata('logout', TRUE);
        redirect(base_url());
    }
}
