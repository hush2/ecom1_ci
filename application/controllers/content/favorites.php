<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorites extends MY_Controller
{
    public $page_title = 'Your Favorite Pages';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('favorite_model', 'favorite');
        $this->load->model('page_model', 'page');
    }

    public function index()
    {
        $data['titles'] = $this->favorite->all();
        $this->load_view('content/favorites', $data);
    }

    public function add($page_id)
    {
        if ($this->favorite->add($page_id))
        {
            $this->session->set_flashdata('added', TRUE);
            redirect("page/{$page_id}");
        }
        show_error(ERROR_SYSTEM);
    }

    public function remove($page_id)
    {
        if ($this->favorite->remove($page_id))
        {
            $this->session->set_flashdata('removed', TRUE);
            redirect("page/{$page_id}");
        }
        show_error(ERROR_SYSTEM);
    }
}
