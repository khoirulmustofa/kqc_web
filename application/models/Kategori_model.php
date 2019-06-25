<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_all_kategori()
    {
        $this->db->order_by('kategori_nama', 'ASC');
        return $this->db->get('kategori');
    }

    function get_kategori_by_id($kategori_id)
    {
        $this->db->where('kategori_id', $kategori_id);
        return $this->db->get('kategori');
    }

    function get_kategori_by_kategori_seo($kategori_seo)
    {
        $this->db->where('kategori_seo', $kategori_seo);
        return $this->db->get('kategori')->row();
    }

    function get_total_rows_kategori($cari = NULL)
    {
        $this->db->like('kategori_nama', $cari);
        $this->db->from('kategori');
        return $this->db->count_all_results();
    }

    function get_limit_data_kategori($limit, $start = 0, $cari = NULL)
    {
        $this->db->order_by('kategori_nama', 'ASC');
        $this->db->like('kategori_nama', $cari);
        $this->db->limit($limit, $start);
        return $this->db->get('kategori');
    }

    function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    function update_kategori($kategori_id, $data)
    {
        $this->db->where('kategori_id', $kategori_id);
        $this->db->update('kategori', $data);
    }

    function delete_kategori($kategori_id)
    {
        $this->db->where('kategori_id', $kategori_id);
        $this->db->delete('kategori');
    }
}