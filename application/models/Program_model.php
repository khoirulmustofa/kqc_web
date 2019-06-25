<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_program_by_id($program_id)
    {
        $this->db->where('program_id', $program_id);
        return $this->db->get('program');
    }

    function total_rows_program($cari = NULL)
    {
        $this->db->like('program_nama', $cari);
        $this->db->or_like('program_kategori', $cari);
        $this->db->from('program');
        return $this->db->count_all_results();
    }

    function get_program_by_kategori($limit, $start = 0, $program_kategori)
    {
        $this->db->where('program_kategori', $program_kategori);
        $this->db->limit($limit, $start);
        return $this->db->get('program');
    }
    
    function get_total_rows_program_by_kategori($program_kategori) {
        $this->db->where('program_kategori', $program_kategori);
        $this->db->from('program');
        return $this->db->count_all_results();
    }

    function get_limit_data_program($limit, $start = 0, $cari = NULL)
    {
        $this->db->order_by('program_id', 'ASC');
        $this->db->like('program_nama', $cari);
        $this->db->or_like('program_kategori', $cari);
        $this->db->limit($limit, $start);
        return $this->db->get('program');
    }

    function insert_program($data)
    {
        $this->db->insert('program', $data);
    }

    function update_program($program_id, $data)
    {
        $this->db->where('program_id', $program_id);
        $this->db->update('program', $data);
    }

    function delete_program($program_id)
    {
        $this->db->where('program_id', $program_id);
        $this->db->delete('program');
    }
}