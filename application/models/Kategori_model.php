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
    
    function get_kategori_by_kategori_seo($kategori_seo) {
        $this->db->where('kategori_seo', $kategori_seo);
        return $this->db->get('kategori')->row();
    }
}