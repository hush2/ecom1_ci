<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model
{
    public function all()
    {
        return $this->db->order_by('category')
                        ->get('categories')->result();
    }

    public function find($id)
    {       
        return $this->db->where('id', $id)
                        ->get('categories')->row();
    }
}
