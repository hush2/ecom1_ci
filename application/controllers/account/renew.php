<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Renew extends MY_Controller
{
    public $page_title = 'Renew Your Account';

    public function index()
    {
        $this->load_view('account/renew');
    }
}
