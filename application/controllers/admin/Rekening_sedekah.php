<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekening_sedekah extends CI_Controller
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
            $config['base_url'] = base_url() . 'admin/rekening_sedekah/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/rekening_sedekah/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/rekening_sedekah/';
            $config['first_url'] = base_url() . 'admin/rekening_sedekah/';
        }
        
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rekening_sedekah_model->get_total_rows_rekening_sedekah($cari);
        $rekening_sedekah = $this->Rekening_sedekah_model->get_limit_data_rekening_sedekah($config['per_page'], $start, $cari)->result();
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'rekening_sedekah_data' => $rekening_sedekah,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'button' => 'List',
            'page' => "Rekening Sedekah"
        );
        $this->template->load('admin/admin_main_template', 'admin/view_rekening_sedekah_list', $data);
    }
    
    public function create()
    {
        $data = array(
            'action' => site_url('admin/rekening_sedekah/create_action'),
            'rekening_sedekah_id' => set_value('rekening_sedekah_id'),
            'rekening_sedekah_nama_bank' => set_value('rekening_sedekah_nama_bank'),
            'rekening_sedekah_no_rekening' => set_value('rekening_sedekah_no_rekening'),
            'js_extend' => "",
            'button' => 'Buat',
            'page' => "Rekening Sedekah"
        );
        $this->template->load('admin/admin_main_template', 'admin/view_rekening_sedekah_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'rekening_sedekah_nama_bank' => $this->input->post('rekening_sedekah_nama_bank',TRUE),
                'rekening_sedekah_no_rekening' => $this->input->post('rekening_sedekah_no_rekening',TRUE),
            );
            
            $this->Rekening_sedekah_model->insert_rekening_sedekah($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/rekening_sedekah'));
        }
    }
    
    public function update($rekening_sedekah_id)
    {
        $row = $this->Rekening_sedekah_model->get_rekening_sedekah_by_id($rekening_sedekah_id)->row();
        
        if ($row) {
            $data = array(
                'action' => site_url('admin/rekening_sedekah/update_action'),
                'rekening_sedekah_id' => set_value('rekening_sedekah_id', $row->rekening_sedekah_id),
                'rekening_sedekah_nama_bank' => set_value('rekening_sedekah_nama_bank', $row->rekening_sedekah_nama_bank),
                'rekening_sedekah_no_rekening' => set_value('rekening_sedekah_no_rekening', $row->rekening_sedekah_no_rekening),
                'js_extend' => "",
                'button' => 'Update',
                'page' => "Rekening Sedekah"
            );
            $this->template->load('admin/admin_main_template', 'admin/view_rekening_sedekah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rekening_sedekah'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('rekening_sedekah_id', TRUE));
        } else {
            $data = array(
                'rekening_sedekah_nama_bank' => $this->input->post('rekening_sedekah_nama_bank',TRUE),
                'rekening_sedekah_no_rekening' => $this->input->post('rekening_sedekah_no_rekening',TRUE),
            );
            
            $this->Rekening_sedekah_model->update_rekening_sedekah($this->input->post('rekening_sedekah_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/rekening_sedekah'));
        }
    }
    
    public function delete($rekening_sedekah_id)
    {
        $row = $this->Rekening_sedekah_model->get_rekening_sedekah_by_id($rekening_sedekah_id);
        
        if ($row) {
            $this->Rekening_sedekah_model->delete_rekening_sedekah($rekening_sedekah_id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/rekening_sedekah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rekening_sedekah'));
        }
    }
    
    public function _rules()
    {
        $this->form_validation->set_rules('rekening_sedekah_nama_bank', 'rekening sedekah nama bank', 'trim|required');
        $this->form_validation->set_rules('rekening_sedekah_no_rekening', 'rekening sedekah no rekening', 'trim|required');
        
        $this->form_validation->set_rules('rekening_sedekah_id', 'rekening_sedekah_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}