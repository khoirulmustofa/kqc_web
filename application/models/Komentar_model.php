<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insert_komentar($data)
    {
        $result = $this->db->insert('komentar', $data);
        return $result;
    }

    public function get_komentar_by_artikel_id($artikel_id)
    {
        $this->db->order_by('komentar_tanggal', 'DESC');
        $this->db->where('artikel_id', $artikel_id);
        $this->db->where('komentar_status', 'Y');
        $this->db->where('komentar_parent', '0');

        return $this->db->get('komentar');
    }

    public function get_balas_komentar_by_artikel_id($artikel_id, $komentar_parent)
    {
        $this->db->order_by('komentar_tanggal', 'DESC');
        $this->db->where('artikel_id', $artikel_id);
        $this->db->where('komentar_status', 'Y');
        $this->db->where('komentar_parent', $komentar_parent);
        return $this->db->get('komentar');
        //$this->db->get('komentar');
        //return  $this->db->last_query();
    }
}