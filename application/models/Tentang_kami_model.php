<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang_kami_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_all_tentang_kami()
    {
        $this->db->order_by('tentang_kami_nama', 'ASC');
        return $this->db->get('tentang_kami');
    }

    function get_tentang_kami_by_tentang_kami_seo($tentang_kami_seo)
    {
        $this->db->where('tentang_kami_seo', $tentang_kami_seo);
        return $this->db->get('tentang_kami')->row();
    }

    function total_rows_tentang_kami($cari = NULL)
    {
        $this->db->from('tentang_kami');
        $this->db->like('tentang_kami_nama', $cari);
        $this->db->or_like('tentang_kami_isi', $cari);
        return $this->db->count_all_results();
    }

    function get_limit_data_tentang_kami($limit, $start = 0, $cari = NULL)
    {
        $this->db->from('tentang_kami');
        $this->db->like('tentang_kami_nama', $cari);
        $this->db->or_like('tentang_kami_isi', $cari);
        $this->db->order_by('tentang_kami_id', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    function get_tentang_kami_by_tentang_kami_id($tentang_kami_id)
    {
        $this->db->where('tentang_kami_id', $tentang_kami_id);
        return $this->db->get('tentang_kami');
    }

    function insert_tentang_kami($data)
    {
        $this->db->insert('tentang_kami', $data);
    }

    function update_tentang_kami($tentang_kami_id, $data)
    {
        $this->db->where('tentang_kami_id', $tentang_kami_id);
        $this->db->update('tentang_kami', $data);
    }

    public function delete_tentang_kami($tentang_kami_id)
    {
        $this->db->where('tentang_kami_id', $tentang_kami_id);
        $this->db->delete('tentang_kami');
    }
}