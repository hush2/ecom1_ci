<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller
{
    public function index($page_id)
    {
        $this->load->model('page_model', 'page');
        $this->load->model('favorite_model', 'favorite');

        if ($page = $this->page->find($page_id))
        {
            $this->load->model('history_model');

            if ($this->session->userdata('id'))
            {
                $this->history_model->add_page($page_id);
            }
            $this->page_title = $page->title;
            $data['page'] = $page;
            $data['is_favorite'] = $this->favorite->is_favorite($page_id);

            return $this->load_view('content/page', $data);
        }
        show_error(ERROR_ACCESS);
    }
}