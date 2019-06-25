<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $cari = urldecode($this->input->get('cari', TRUE));
        $start = intval($this->input->get('start'));

        if ($cari != '') {
            $config['base_url'] = base_url() . 'artikel/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'artikel/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'artikel/';
            $config['first_url'] = base_url() . 'artikel/';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($cari, NULL);
        $artikel = $this->Artikel_model->get_limit_data_artikel($config['per_page'], $start, $cari, NULL);
        $kategori = $this->Kategori_model->get_all_kategori();
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'page' => "artikel_list",
            'kategori_data' => $kategori,
            'artikel_data' => $artikel,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'cari' => $cari,
            'action' => site_url('artikel'),
            'tag_data' => $this->Tag_model->get_all_tag()->result()
        );
        if ($config['total_rows'] < 1) {
            $this->template->load(template() . '/main_template', template() . '/view_artikel_empty', $data);
            return;
        }

        $this->template->load(template() . '/main_template', template() . '/view_artikel_list', $data);
    }

    public function detail($artikel_judul_seo)
    {
        $row = $this->Artikel_model->get_artikel_by_judul_seo($artikel_judul_seo)->row();
        if ($row) {
            $data = array(
                'page' => "artikel_detail",
                'artikel_id' => $row->artikel_id,
                'kategori_id' => $row->kategori_id,
                'artikel_username' => $row->artikel_username,
                'artikel_judul' => $row->artikel_judul,
                'artikel_judul_seo' => $row->artikel_judul_seo,
                'artikel_isi' => $row->artikel_isi,
                'artikel_hari' => $row->artikel_hari,
                'artikel_tanggal' => $row->artikel_tanggal,
                'artikel_gambar' => $row->artikel_gambar,
                'artikel_view' => $row->artikel_view,
                'artikel_tag' => $row->artikel_tag,
                'kategori_nama' => $row->kategori_nama,
                'kategori_seo' => $row->kategori_seo,
                'cari' => NULL,
                'action' => site_url('artikel'),
                'tag_data' => $this->Tag_model->get_all_tag()->result(),
                'kategori_data' => $this->Kategori_model->get_all_kategori(),
                'komentar_data' => $this->Komentar_model->get_komentar_by_artikel_id($row->artikel_id)
            );
            $this->template->load(template() . '/main_template', template() . '/view_artikel_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function kategori($kategori_seo)
    {
        $q_kategori = $this->Kategori_model->get_kategori_by_kategori_seo($kategori_seo);

        $kategori_id = $q_kategori->kategori_id;

        $cari = urldecode($this->input->get('cari', TRUE));
        $start = intval($this->input->get('start'));

        if ($cari != '') {
            $config['base_url'] = base_url() . 'artikel/kategori/' . $q_kategori->kategori_seo . '?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'artikel/kategori/' . $q_kategori->kategori_seo . '?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'artikel/kategori/' . $q_kategori->kategori_seo . '/';
            $config['first_url'] = base_url() . 'artikel/kategori/' . $q_kategori->kategori_seo . '/';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($cari, $kategori_id);
        $artikel = $this->Artikel_model->get_limit_data_artikel($config['per_page'], $start, $cari, $kategori_id);
        $kategori = $this->Kategori_model->get_all_kategori();
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'page' => "artikel_list",
            'kategori_data' => $kategori,
            'artikel_data' => $artikel,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'cari' => $cari,
            'action' => site_url('artikel/kategori/' . $q_kategori->kategori_seo),
            'tag_data' => $this->Tag_model->get_all_tag()->result()
        );
        if ($config['total_rows'] < 1) {
            $this->template->load(template() . '/main_template', template() . '/view_artikel_empty', $data);
            return;
        }

        $this->template->load(template() . '/main_template', template() . '/view_artikel_list', $data);
    }
    
    public function tag($tag_seo)
    {
                
        $cari = urldecode($this->input->get('cari', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($cari != '') {
            $config['base_url'] = base_url() . 'artikel/tag/' . $tag_seo . '?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'artikel/tag/' . $tag_seo . '?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'artikel/tag/' . $tag_seo . '/';
            $config['first_url'] = base_url() . 'artikel/tag/' . $tag_seo . '/';
        }
        
        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($cari, NULL,$tag_seo);
        $artikel = $this->Artikel_model->get_limit_data_artikel($config['per_page'], $start, $cari, NULL,$tag_seo);
        $kategori = $this->Kategori_model->get_all_kategori();
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'page' => "artikel_list",
            'kategori_data' => $kategori,
            'artikel_data' => $artikel,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'cari' => $cari,
            'action' => site_url('artikel/tag/' . $tag_seo),
            'tag_data' => $this->Tag_model->get_all_tag()->result()
        );
        if ($config['total_rows'] < 1) {
            $this->template->load(template() . '/main_template', template() . '/view_artikel_empty', $data);
            return;
        }
        
        $this->template->load(template() . '/main_template', template() . '/view_artikel_list', $data);
    }

    public function insert_komentar()
    {
        $data = array(
            'artikel_id' => $this->input->post('artikel_id'),
            'komentar_nama' => $this->input->post('komentar_nama'),
            'komentar_email' => $this->input->post('komentar_email'),
            'komentar_isi' => $this->input->post('komentar_isi'),
            'komentar_tanggal' => date("Y-m-d H:i:s"),
            'komentar_status' => 'N',
            'komentar_parent' => '0'
        );
        $result = $this->Komentar_model->insert_komentar($data);
        echo json_encode($result);
    }
}