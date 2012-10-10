<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $page_title;

    public function __construct()
    {
        parent::__construct();

        // Load our settings.
        $this->config->load('MY_config');

        $route = $this->router->fetch_class();

        // Deny certain pages for non-logged in users.
        $members = $this->config->item('members');
        if ( ! $this->session->userdata('id') AND in_array($route, $members))
        {
            show_error('Logged in users only.');
        }

        // Deny certain pages for logged in users (eg. register).
        $guest = $this->config->item('guest');
        if ($this->session->userdata('id') AND in_array($route, $guest))
        {
            redirect('/');
        }

        // Load the (most used) model. The _model suffix was added to prevent conflicts
        // with controller class names.
        $this->load->model('user_model', 'user');
        $this->load->model('category_model', 'category');
    }

    public function load_view($view, $data = array())
    {
        // Category list for the sidebar.
        $data['categories'] = $this->category->all();
        if (empty($data['categories']))
        {
            show_error(ERROR_SYSTEM);
        } 
        $content = $this->load->view($view, $data, TRUE);
        $this->load->view('base', array('content' => $content));
    }

    function is_post()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

}