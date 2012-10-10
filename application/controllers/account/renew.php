<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Renew extends MY_Controller
{
    public $page_title = 'Renew Your Account';

    public function index()
    {
        if ($this->is_post())
        {
            if ($this->user->renew())
            {
                redirect('logout');
            }
        }
        $this->load_view('account/renew');
    }
}
