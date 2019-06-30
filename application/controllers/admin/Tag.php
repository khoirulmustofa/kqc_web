<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tag extends CI_Controller
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
            $config['base_url'] = base_url() . 'admin/tag/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/tag/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/tag/';
            $config['first_url'] = base_url() . 'admin/tag/';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tag_model->get_total_rows_tag($cari);
        $tag = $this->Tag_model->get_limit_data_tag($config['per_page'], $start, $cari)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tag_data' => $tag,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'button' => 'List',
            'page' => "Tag"
        );
        $this->template->load('admin/admin_main_template', 'admin/view_tag_list', $data);
    }

    public function create()
    {
        $data = array(
            'action' => site_url('admin/tag/create_action'),
            'tag_id' => set_value('tag_id'),
            'tag_nama' => set_value('tag_nama'),
            'button' => 'Buat',
            'page' => "Tag"
        );
        $this->template->load('admin/admin_main_template', 'admin/view_tag_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tag_nama' => ucwords($this->input->post('tag_nama',TRUE)),
                'tag_seo' => seo_title($this->input->post('tag_nama', TRUE)),
            );

            $this->Tag_model->insert_tag($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tag'));
        }
    }

    public function update($tag_id)
    {
        $row = $this->Tag_model->get_tag_by_id($tag_id)->row();

        if ($row) {
            $data = array(
                'action' => site_url('admin/tag/update_action'),
                'tag_id' => set_value('tag_id', $row->tag_id),
                'tag_nama' => set_value('tag_nama', $row->tag_nama),
                'button' => 'Update',
                'page' => "Tag"
            );
            $this->template->load('admin/admin_main_template', 'admin/view_tag_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tag'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tag_id', TRUE));
        } else {
            $data = array(
                'tag_nama' => ucwords($this->input->post('tag_nama',TRUE)),
                'tag_seo' => seo_title($this->input->post('tag_nama', TRUE)),
            );

            $this->Tag_model->update_tag($this->input->post('tag_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tag'));
        }
    }

    public function delete($tag_id)
    {
        $row = $this->Tag_model->get_tag_by_id($tag_id);

        if ($row) {
            $this->Tag_model->delete_tag($tag_id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tag'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tag'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tag_nama', 'tag nama', 'trim|required');

        $this->form_validation->set_rules('tag_id', 'tag_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}