<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Program extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function pendidikan_dakwah()
    {
        $program_kategori = 'pendidikan-dan-dakwah';
        $start = intval($this->input->get('start'));
        $config['base_url'] = base_url() . 'pendidikan-dakwah/';
        $config['first_url'] = base_url() . 'pendidikan-dakwah/';
        $config['per_page'] = 1;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->get_total_rows_program_by_kategori($program_kategori);
        $program = $this->Program_model->get_program_by_kategori($config['per_page'], $start, $program_kategori)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu' => "Program",
            'page'=>"Pendidikan dan Dakwah",
            'program_data' => $program,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_list', $data);
    }
    
    public function sosial_kemanusiaan()
    {
        $program_kategori = 'sosial-dan-kemanusian';
        $start = intval($this->input->get('start'));
        $config['base_url'] = base_url() . 'sosial-kemanusian/';
        $config['first_url'] = base_url() . 'sosial-kemanusian/';
        $config['per_page'] = 1;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->get_total_rows_program_by_kategori($program_kategori);
        $pendidikan_dakwah = $this->Program_model->get_program_by_kategori($config['per_page'], $start, $program_kategori)->result();
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'menu' => "Program",
            'page'=>"Sosial dan Kemanusiaan",
            'program_data' => $pendidikan_dakwah,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_list', $data);
    }
    
    public function pengembangan_masyarakat()
    {
        $program_kategori = 'pengembangan-masyarakat';
        $start = intval($this->input->get('start'));
        $config['base_url'] = base_url() . 'pengembangan-masyarakat/';
        $config['first_url'] = base_url() . 'pengembangan-masyarakat/';
        $config['per_page'] = 1;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->get_total_rows_program_by_kategori($program_kategori);
        $pendidikan_dakwah = $this->Program_model->get_program_by_kategori($config['per_page'], $start, $program_kategori)->result();
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'menu' => "Program",
            'page'=>"Sosial dan Kemanusiaan",
            'program_data' => $pendidikan_dakwah,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_list', $data);
    }
    
    public function detail($artikel_judul_seo)
    {
        $row = $this->Program_model->get_artikel_by_judul_seo($artikel_judul_seo)->row();
        
        $kategori = $this->Kategori_model->get_all_kategori()->result();
        $tag = $this->Tag_model->get_all_tag()->result();
        
        if ($row) {
            $data = array(
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
                'tag_data' => $tag,
                'kategori_data' => $kategori,
                'komentar_data' => $this->Komentar_model->get_komentar_by_artikel_id($row->artikel_id),
                'menu' => "Artikel",
                'page' => $row->artikel_judul
            );
            $this->template->load(template() . '/main_template', template() . '/view_artikel_detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }
}