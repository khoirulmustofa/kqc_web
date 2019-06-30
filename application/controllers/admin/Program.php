<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Program extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function index()
    {
        $cari = urldecode($this->input->get('cari', TRUE));
        $start = intval($this->input->get('start'));

        if ($cari != '') {
            $config['base_url'] = base_url() . 'admin/program/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/program/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/program/';
            $config['first_url'] = base_url() . 'admin/program/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->total_rows_program($cari);
        $program = $this->Program_model->get_limit_data_program($config['per_page'], $start, $cari)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'button' => 'List',
            'program_data' => $program,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page' => 'Program'
        );
        $this->template->load('admin/admin_main_template', 'admin/view_program_list', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('admin/program/create_action'),
            'program_id' => set_value('program_id'),
            'program_nama' => set_value('program_nama'),
            'program_kategori' => set_value('program_kategori'),
            'program_seo' => set_value('program_seo'),
            'program_gambar_1' => set_value('program_gambar'),
            'program_isi' => set_value('program_isi'),
            'program_status' => set_value('program_status'),
            'js_extend' => "CKEDITOR.replace('program_isi');",
            'page' => 'Program'
        );

        $this->template->load('admin/admin_main_template', 'admin/view_program_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path'] = 'template/assets/gambar_program/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if (! empty($_FILES['program_gambar']['name'])) {
                if ($this->upload->do_upload('program_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_program/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 340;
                    $config['height'] = 360;
                    $config['new_image'] = 'template/assets/gambar_program/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(                        
                        'program_nama' => $this->input->post('program_nama',TRUE),
                        'program_kategori' => $this->input->post('program_kategori',TRUE),
                        'program_seo' => seo_title($this->input->post('program_nama', TRUE)),
                        'program_gambar' => $gbr['file_name'],
                        'program_isi' => $this->input->post('program_isi',TRUE),
                        'program_status' => $this->input->post('program_status',TRUE)
                    );
                }
            } else {
                $data = array(
                    'program_nama' => $this->input->post('program_nama',TRUE),
                    'program_kategori' => $this->input->post('program_kategori',TRUE),
                    'program_seo' => seo_title($this->input->post('program_nama', TRUE)),
                    'program_isi' => $this->input->post('program_isi',TRUE),
                    'program_status' => $this->input->post('program_status',TRUE)
                );
            }

            $this->Program_model->insert_program($data);
            $this->session->set_flashdata('message', 'Create Program Record Success');
            redirect(site_url('admin/program'));
        }
    }
    
    public function update($program_id)
    {
        $row = $this->Program_model->get_program_by_id($program_id)->row();
        
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/program/update_action'),
                'program_id' => set_value('program_id', $row->program_id),
                'program_nama' => set_value('program_nama', $row->program_nama),
                'program_kategori' => set_value('program_kategori', $row->program_kategori),
                'program_seo' => set_value('program_seo', $row->program_seo),
                'program_gambar_1' => set_value('program_gambar', $row->program_gambar),
                'program_isi' => set_value('program_isi', $row->program_isi),
                'program_status' => set_value('program_status', $row->program_status),                
                'js_extend' => "CKEDITOR.replace('program_isi');",
                'page'=>'program'
            );
            $this->template->load('admin/admin_main_template', 'admin/view_program_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/program'));
        }
    }
    
    public function update_action()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('program_id', TRUE));
        } else {            
            $config['upload_path'] = 'template/assets/gambar_program/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
                                   
            if (! empty($_FILES['program_gambar']['name'])) {
                if ($this->upload->do_upload('program_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_program/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 340;
                    $config['height'] = 360;
                    $config['new_image'] = 'template/assets/gambar_program/' . $gbr['file_name'];
                    
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $this->watermark_program($gbr['file_name']);
                    $this->image_lib->clear();
                    
                    $data = array(
                        'program_nama' => $this->input->post('program_nama',TRUE),
                        'program_kategori' => $this->input->post('program_kategori',TRUE),
                        'program_seo' => seo_title($this->input->post('program_nama', TRUE)),
                        'program_gambar' => $gbr['file_name'],
                        'program_isi' => $this->input->post('program_isi',TRUE),
                        'program_status' => $this->input->post('program_status',TRUE)
                    );
                    $path_file = 'template/assets/gambar_program/' . $this->input->post('program_gambar_1', TRUE);
                    if (file_exists($path_file)) {
                        unlink($path_file);
                    }
                }
            } else {
                $data = array(
                    'program_nama' => $this->input->post('program_nama',TRUE),
                    'program_kategori' => $this->input->post('program_kategori',TRUE),
                    'program_seo' => seo_title($this->input->post('program_nama', TRUE)),
                    'program_isi' => $this->input->post('program_isi',TRUE),
                    'program_status' => $this->input->post('program_status',TRUE)
                );
            }
            
            $this->Program_model->update_program($this->input->post('program_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Create program Record Success');
            redirect(site_url('admin/program'));
        }
    }
    
    public function delete($program_id)
    {
        $row = $this->Program_model->get_program_by_id($program_id)->row();
        
        if ($row) {
            $this->Program_model->delete_program($program_id);
            $path_file = 'template/assets/gambar_program/' . $row->program_gambar;
            if (file_exists($path_file)) {
                unlink($path_file);
            }
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/program'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/program'));
        }
    }
    
    public function watermark_program($nama_file)
    {
        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image'] = 'template/assets/gambar_program/' . $nama_file;
        $imgConfig['wm_text'] = 'Copyright ' . date('Y') . ' - Kampung Qur`an Cikarang';
        $imgConfig['wm_type'] = 'text';
        $imgConfig['wm_font_size'] = '12';
        $this->load->library('image_lib', $imgConfig);
        
        $this->image_lib->initialize($imgConfig);
        
        $this->image_lib->watermark();
    }

    public function _rules()
    {
        $this->form_validation->set_rules('program_nama', 'Program Nama', 'trim|required');
        $this->form_validation->set_rules('program_kategori', 'kategori', 'trim|required');
        $this->form_validation->set_rules('program_gambar', 'Gambar');
        $this->form_validation->set_rules('program_isi', 'Program Isi', 'trim|required');
        $this->form_validation->set_rules('program_status', 'Status');

        $this->form_validation->set_rules('program_id', 'program_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
        