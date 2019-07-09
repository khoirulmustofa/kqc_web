<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Carousel_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_carousel() {
        $this->db->order_by('carousel_nama', 'ASC');
        return $this->db->get('carousel');
    }

    function total_rows_carousel($cari = NULL)
    {
        $this->db->from('carousel');
        $this->db->like('carousel_nama', $cari);
        return $this->db->count_all_results();
    }
    
    function get_limit_data_carousel($limit, $start = 0, $cari = NULL)
    {
        $this->db->from('carousel');
        $this->db->like('carousel_nama', $cari);        
        $this->db->order_by('carousel_nama', 'ASC');        
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    function get_carousel_by_carousel_id($carousel_id)
    {
        $this->db->where('carousel_id', $carousel_id);
        return $this->db->get('carousel');
        
    }
    
    function insert_carousel($data)
    {
        $this->db->insert('carousel', $data);
    }
    
    function update_carousel($carousel_id, $data)
    {
        $this->db->where('carousel_id', $carousel_id);
        $this->db->update('carousel', $data);
    }
    
    public function delete_carousel($carousel_id)
    {
        $this->db->where('carousel_id', $carousel_id);
        $this->db->delete('carousel');
    }
}