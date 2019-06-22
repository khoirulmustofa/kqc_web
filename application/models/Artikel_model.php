<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get_artikel_by_judul_seo
    function get_artikel_by_judul_seo($artikel_judul_seo)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('artikel_judul_seo', $artikel_judul_seo);
        return $this->db->get();
    }
    
    // get_artikel_by_judul_seo
    function get_artikel_by_artikel_id($artikel_id)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('artikel_id', $artikel_id);
        return $this->db->get();
    }

    function total_rows_artikel($cari = NULL, $kategori_id = NULL, $tag_seo = NULL)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        if ($kategori_id != NULL) {
            $this->db->where('artikel.kategori_id', $kategori_id);
        }        
        if ($tag_seo != NULL) {
            $this->db->like('artikel_tag', $tag_seo);
        }
        if ($cari != NULL) {
            $this->db->like('artikel_judul', $cari);
            $this->db->or_like('kategori_nama', $cari);
        }

        return $this->db->count_all_results();
    }

    function get_limit_data_artikel($limit, $start = 0, $cari = NULL, $kategori_id = NULL, $tag_seo = NULL)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        if ($kategori_id != NULL) {
            $this->db->where('artikel.kategori_id', $kategori_id);
        }
        if ($tag_seo != NULL) {
            $this->db->like('artikel_tag', $tag_seo);
        }
        if ($cari != NULL) {
            $this->db->like('artikel_judul', $cari);
            $this->db->or_like('kategori_nama', $cari);
        }

        $this->db->order_by('artikel_tanggal', 'ASC');

        $this->db->limit($limit, $start);
        return $this->db->get();
        //return $this->db->last_query();
    }

    function update_artikel($id, $data)
    {
        $this->db->where('artikel_id', $id);
        $this->db->update('artikel', $data);
    }
}