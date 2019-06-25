<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tag_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_tag()
    {
        $this->db->order_by('tag_nama', 'ASC');
        return $this->db->get('tag');
    }
    function get_tag_by_id($tag_id)
    {
        $this->db->where('tag_id', $tag_id);
        return $this->db->get('tag');
    }
    function get_total_rows_tag($cari = NULL)
    {
        $this->db->like('tag_nama', $cari);
        $this->db->from('tag');
        return $this->db->count_all_results();
    }
    
    function get_limit_data_tag($limit, $start = 0, $cari = NULL)
    {
        $this->db->order_by('tag_nama', 'ASC');
        $this->db->like('tag_nama', $cari);
        $this->db->limit($limit, $start);
        return $this->db->get('tag');
    }
    
    function insert_tag($data)
    {
        $this->db->insert('tag', $data);
    }
    
    function update_tag($tag_id, $data)
    {
        $this->db->where('tag_id', $tag_id);
        $this->db->update('tag', $data);
    }
    
    function delete_tag($tag_id)
    {
        $this->db->where('tag_id', $tag_id);
        $this->db->delete('tag');
    }
}