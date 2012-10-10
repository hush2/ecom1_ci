<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_Model extends CI_Model
{
    public function all($category_id)
    {
        return $this->db->select('id, title, description')                        
                        ->where('category_id', $category_id)
                        ->order_by('date_created', 'desc')
                        ->get('pages')->result();
    }

    public function add($page)
    {
        $allowed = '<div><p><span><br><a><img><h1><h2><h3><h4><ul><ol><li><blockquote><b><strong><em><i><u><strike><sub><sup><font><hr>';

        $values = array(
                'category_id' => $page['category_id'],
                'title'       => strip_tags($page['title']),
                'description' => strip_tags($page['description']),
                'content'     => strip_tags($page['content'], $allowed),
        );
        return $this->db->insert('pages', $values);
    }

    public function find($page_id)
    {
        return $this->db->select('id, title, description, content')
                        ->where('id', $page_id)
                        ->get('pages')->row();
    }
}
