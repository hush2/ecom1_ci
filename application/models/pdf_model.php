<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf_Model extends CI_Model
{
    public function add($pdf, $post)
    {
        $values = array(
            'tmp_name'    => $pdf['raw_name'],
            'title'       => strip_tags($post['title']),
            'description' => strip_tags($post['description']),
            'file_name'   => $pdf['orig_name'],
            'size'        => round($pdf['file_size']),
        );
        return $this->db->insert('pdfs', $values);
    }

    public function all()
    {
        return $this->db->order_by('date_created', 'desc')
                        ->get('pdfs')->result();
    }

    public function find($pdf_name)
    {
        return $this->db->where('tmp_name', $pdf_name)
                        ->get('pdfs')->row();
    }
}
