<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
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
            $config['base_url'] = base_url() . 'admin/kategori/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/kategori/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/kategori/';
            $config['first_url'] = base_url() . 'admin/kategori/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_model->get_total_rows_kategori($cari);
        $kategori = $this->Kategori_model->get_limit_data_kategori($config['per_page'], $start, $cari)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_data' => $kategori,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'button' => 'List',
            'page' => "Kategori"
        );
        $this->template->load('admin/admin_main_template', 'admin/view_kategori_list', $data);
    }

    public function create()
    {
        $data = array(
            'action' => site_url('admin/kategori/create_action'),
            'kategori_id' => set_value('kategori_id'),
            'kategori_nama' => set_value('kategori_nama'),
            'kategori_seo' => set_value('kategori_seo'),
            'js_extend' => "",
            'button' => 'Buat',
            'page' => "Kategori"
        );
        $this->template->load('admin/admin_main_template', 'admin/view_kategori_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kategori_nama' => $this->input->post('kategori_nama', TRUE),
                'kategori_seo' => seo_title($this->input->post('kategori_nama', TRUE)),
            );

            $this->Kategori_model->insert_kategori($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/kategori'));
        }
    }

    public function update($kategori_id)
    {
        $row = $this->Kategori_model->get_kategori_by_id($kategori_id)->row();

        if ($row) {
            $data = array(
                'action' => site_url('admin/kategori/update_action'),
                'kategori_id' => set_value('kategori_id', $row->kategori_id),
                'kategori_nama' => set_value('kategori_nama', $row->kategori_nama),
                'kategori_seo' => set_value('kategori_seo', $row->kategori_seo),
                'js_extend' => "",
                'button' => 'Update',
                'page' => "Kategori"
            );
            $this->template->load('admin/admin_main_template', 'admin/view_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kategori'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kategori_id', TRUE));
        } else {
            $data = array(
                'kategori_nama' => $this->input->post('kategori_nama', TRUE),
                'kategori_seo' =>seo_title($this->input->post('kategori_nama', TRUE)),
            );

            $this->Kategori_model->update_kategori($this->input->post('kategori_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/kategori'));
        }
    }
    
    public function delete($kategori_id)
    {
        $row = $this->Kategori_model->get_kategori_by_id($kategori_id);
        
        if ($row) {
            $this->Kategori_model->delete_kategori($kategori_id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kategori'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kategori_nama', 'kategori nama', 'trim|required');

        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}