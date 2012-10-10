<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller
{
    public function index($category_id)
    {
        if ($category = $this->category->find($category_id))
        {
            $this->load->model('page_model');

            $this->page_title = $category->category;
            $data['titles'] = $this->page_model->all($category_id);
            return $this->load_view('content/category', $data);
        }
        show_error(ERROR_ACCESS);
    }
}
