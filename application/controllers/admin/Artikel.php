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
            $config['base_url'] = base_url() . 'admin/artikel/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/artikel/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/artikel/';
            $config['first_url'] = base_url() . 'admin/artikel/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($cari, NULL, NULL);
        $artikel = $this->Artikel_model->get_limit_data_artikel($config['per_page'], $start, $cari, NULL, NULL)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'artikel_data' => $artikel,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load('admin/admin_main_template', 'admin/view_artikel_list', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'judul_artikel' => 'Hallo0',
            'action' => site_url('artikel/create_action'),
            'artikel_id' => set_value('artikel_id'),
            'kategori_id' => set_value('kategori_id'),
            'artikel_username' => set_value('artikel_username'),
            'artikel_judul' => set_value('artikel_judul'),
            'artikel_judul_seo' => set_value('artikel_judul_seo'),
            'artikel_isi' => set_value('artikel_isi'),
            'artikel_hari' => set_value('artikel_hari'),
            'artikel_tanggal' => set_value('artikel_tanggal'),
            'artikel_gambar_1' => set_value('artikel_gambar'),
            'artikel_view' => set_value('artikel_view'),
            'tag_data' => $this->Tag_model->get_all_tag()->result()
        );

        $this->template->load('admin/admin_main_template', 'admin/view_artikel_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kategori_id' => $this->input->post('kategori_id', TRUE),
                'artikel_username' => $this->input->post('artikel_username', TRUE),
                'artikel_judul' => $this->input->post('artikel_judul', TRUE),
                'artikel_judul_seo' => $this->input->post('artikel_judul_seo', TRUE),
                'artikel_isi' => $this->input->post('artikel_isi', TRUE),
                'artikel_hari' => $this->input->post('artikel_hari', TRUE),
                'artikel_tanggal' => $this->input->post('artikel_tanggal', TRUE),
                'artikel_gambar' => $this->input->post('artikel_gambar', TRUE),
                'artikel_view' => $this->input->post('artikel_view', TRUE),
                'artikel_tag' => $this->input->post('artikel_tag', TRUE)
            );

            $this->Artikel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/artikel'));
        }
    }
    
    public function update($artikel_id)
    {
        $row = $this->Artikel_model->get_artikel_by_artikel_id($artikel_id)->row();
        
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('artikel/update_action'),
                'artikel_id' => set_value('artikel_id', $row->artikel_id),
                'kategori_id' => set_value('kategori_id', $row->kategori_id),
                'artikel_username' => set_value('artikel_username', $row->artikel_username),
                'artikel_judul' => set_value('artikel_judul', $row->artikel_judul),
                'artikel_judul_seo' => set_value('artikel_judul_seo', $row->artikel_judul_seo),
                'artikel_isi' => set_value('artikel_isi', $row->artikel_isi),
                'artikel_hari' => set_value('artikel_hari', $row->artikel_hari),
                'artikel_tanggal' => set_value('artikel_tanggal', $row->artikel_tanggal),
                'artikel_gambar_1' => set_value('artikel_gambar', $row->artikel_gambar),
                'artikel_view' => set_value('artikel_view', $row->artikel_view),
                'tag_data' => $this->Tag_model->get_all_tag()->result()
            );
            $this->template->load('admin/admin_main_template', 'admin/view_artikel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/artikel'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kategori_id', 'kategori id', 'trim|required');
        $this->form_validation->set_rules('artikel_username', 'artikel username', 'trim|required');
        $this->form_validation->set_rules('artikel_judul', 'artikel judul', 'trim|required');
        $this->form_validation->set_rules('artikel_judul_seo', 'artikel judul seo', 'trim|required');
        $this->form_validation->set_rules('artikel_isi', 'artikel isi', 'trim|required');
        $this->form_validation->set_rules('artikel_hari', 'artikel hari', 'trim|required');
        $this->form_validation->set_rules('artikel_tanggal', 'artikel tanggal', 'trim|required');
        $this->form_validation->set_rules('artikel_gambar', 'artikel gambar', 'trim|required');
        $this->form_validation->set_rules('artikel_view', 'artikel view', 'trim|required');
        $this->form_validation->set_rules('artikel_tag', 'artikel tag', 'trim|required');

        $this->form_validation->set_rules('artikel_id', 'artikel_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}