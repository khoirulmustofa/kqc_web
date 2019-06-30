<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_artikel_by_kategori_top3($kategori_seo)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('kategori.kategori_seo', $kategori_seo);
        $this->db->order_by('artikel.artikel_tanggal', 'DESC');
        $this->db->limit(3, 0);
        return $this->db->get();
    }

    // get_artikel_by_judul_seo
    function get_artikel_by_judul_seo($artikel_judul_seo)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('artikel_judul_seo', $artikel_judul_seo);
        return $this->db->get();
    }

    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get_artikel_by_judul_seo
    function get_artikel_by_artikel_id($artikel_id)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('artikel_id', $artikel_id);
        return $this->db->get();
    }

    function get_by_id($id)
    {
        $this->db->where('artikel_id', $id);
        return $this->db->get('artikel')->row();
    }

    function total_rows_artikel($cari = NULL, $kategori_id = NULL, $tag_seo = NULL)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('artikel.artikel_status', 'Y');

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

    public function delete_artikel($artikel_id)
    {
        $this->db->where('artikel_id', $artikel_id);
        $this->db->delete('artikel');
    }

    function get_limit_data_artikel($limit, $start = 0, $cari = NULL, $kategori_id = NULL, $tag_seo = NULL)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->where('artikel.artikel_status', 'Y');

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
        // return $this->db->last_query();
    }

    function get_limit_data_artikel_admin($limit, $start = 0, $cari = NULL)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->like('artikel_judul', $cari);
        $this->db->or_like('kategori_nama', $cari);

        $this->db->order_by('artikel_tanggal', 'ASC');

        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    function total_rows_artikel_admin($cari = NULL)
    {
        $this->db->from('artikel');
        $this->db->join('kategori', 'kategori.kategori_id = artikel.kategori_id');
        $this->db->like('artikel_judul', $cari);
        $this->db->or_like('kategori_nama', $cari);

        return $this->db->count_all_results();
    }

    function update_artikel($id, $data)
    {
        $this->db->where('artikel_id', $id);
        $this->db->update('artikel', $data);
    }

    function insert_artikel($data)
    {
        $this->db->insert('artikel', $data);
    }
}