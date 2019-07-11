<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekening_sedekah_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_all_rekening_sedekah()
    {
        $this->db->order_by('rekening_sedekah_nama_bank', 'ASC');
        return $this->db->get('rekening_sedekah');
    }

    function get_rekening_sedekah_by_id($rekening_sedekah_id)
    {
        $this->db->where('rekening_sedekah_id', $rekening_sedekah_id);
        return $this->db->get('rekening_sedekah');
    }

    function get_total_rows_rekening_sedekah($cari = NULL)
    {
        $this->db->like('rekening_sedekah_nama_bank', $cari);
        $this->db->from('rekening_sedekah');
        return $this->db->count_all_results();
    }

    function get_limit_data_rekening_sedekah($limit, $start = 0, $cari = NULL)
    {
        $this->db->order_by('rekening_sedekah_nama_bank', 'ASC');
        $this->db->like('rekening_sedekah_nama_bank', $cari);
        $this->db->limit($limit, $start);
        return $this->db->get('rekening_sedekah');
    }

    function insert_rekening_sedekah($data)
    {
        $this->db->insert('rekening_sedekah', $data);
    }

    function update_rekening_sedekah($rekening_sedekah_id, $data)
    {
        $this->db->where('rekening_sedekah_id', $rekening_sedekah_id);
        $this->db->update('rekening_sedekah', $data);
    }

    function delete_rekening_sedekah($rekening_sedekah_id)
    {
        $this->db->where('rekening_sedekah_id', $rekening_sedekah_id);
        $this->db->delete('rekening_sedekah');
    }
}