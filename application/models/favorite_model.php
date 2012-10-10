<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorite_Model extends CI_Model
{
    public function add($page_id)
    {
        if ($this->page->find($page_id))
        {
            return $this->db->set('user_id', $this->session->userdata('id'))
                            ->set('page_id', $page_id)
                            ->replace('favorite_pages');
        }
    }

    public function remove($page_id)
    {
        if ($this->page->find($page_id))
        {
            return $this->db->where('user_id', $this->session->userdata('id'))
                            ->where('page_id', $page_id)
                            ->limit(1)
                            ->delete('favorite_pages');
        }
    }

    public function all()
    {
        return $this->db->join('favorite_pages', 'pages.id=favorite_pages.page_id')
                        ->where('favorite_pages.user_id', $this->session->userdata('id'))
                        ->order_by('title')
                        ->get('pages')->result();
    }

    public function is_favorite($page_id)
    {
        return $this->db->where('user_id', $this->session->userdata('id'))
                        ->where('page_id', $page_id)
                        ->get('favorite_pages')->num_rows();
    }
}
