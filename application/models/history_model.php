<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History_Model extends CI_Model
{
    public function add_page($page_id)
    {
        $values = array(
            'user_id' => $this->session->userdata('id'),
            'type'    => 'page',
            'page_id' => $page_id,
        );
        return $this->db->insert('history', $values);
    }

    public function add_pdf($pdf_id)
    {
        $values = array(
            'user_id' => $this->session->userdata('id'),
            'type'    => 'pdf',
            'pdf_id'  => $pdf_id,
        );
        return $this->db->insert('history', $values);
    }

    public function page_all()
    {
        $this->db->select('pages.id, title, description')
                 ->select('DATE_FORMAT(history.date_created, "%M %d, %Y") as date', FALSE)
                 ->from('pages')
                 ->join('history', 'history.page_id=pages.id')
                 ->where('history.user_id', $this->session->userdata('id'))
->where('history.type', 'page')                 
                 ->group_by('history.page_id')
                 ->order_by('history.date_created', 'desc');
        return $this->db->get()->result();
    }

    public function pdf_all()
    {
        $this->db->select('pdfs.tmp_name, title, description')
                 ->select('DATE_FORMAT(history.date_created, "%M %d, %Y") as date', FALSE)
                 ->from('pdfs')
                 ->join('history', 'history.pdf_id=pdfs.id')
                 ->where('history.user_id', $this->session->userdata('id'))
->where('history.type', 'pdf')
                 ->group_by('history.pdf_id')
                 ->order_by('history.date_created', 'desc');
        return $this->db->get()->result();
    }

    public function popular()
    {
        $this->db->select('pages.id, pages.title')
                 ->select('COUNT(history.id) as n', FALSE)
                 ->from('pages, history')
                 ->where('pages.id=history.page_id', NULL, FALSE)
                 ->where('history.type', 'page')
                 ->group_by('history.page_id')
                 ->order_by('n', 'desc')
                 ->limit(6);
       return $this->db->get()->result();
    }
}
