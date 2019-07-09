<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang_kami extends CI_Controller
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
            $config['base_url'] = base_url() . 'admin/tentang_kami/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/tentang_kami/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/tentang_kami/';
            $config['first_url'] = base_url() . 'admin/tentang_kami/';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tentang_kami_model->total_rows_tentang_kami($cari);
        $tentang_kami = $this->Tentang_kami_model->get_limit_data_tentang_kami($config['per_page'], $start, $cari)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'button' => 'List',
            'tentang_kami_data' => $tentang_kami,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page' => 'Tentang Kami'
        );
        $this->template->load('admin/admin_main_template', 'admin/view_tentang_kami_list', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('admin/tentang_kami/create_action'),
            'tentang_kami_id' => set_value('tentang_kami_id'),
            'tentang_kami_nama' => set_value('tentang_kami_nama'),
            'tentang_kami_isi' => set_value('tentang_kami_isi'),
            'tentang_kami_gambar_1' => set_value('tentang_kami_gambar'),
            'js_extend' => "CKEDITOR.replace('tentang_kami_isi');",
            'page' => 'Tentang Kami'
        );

        $this->template->load('admin/admin_main_template', 'admin/view_tentang_kami_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path'] = 'template/assets/gambar_tentang_kami/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if (! empty($_FILES['tentang_kami_gambar']['name'])) {
                if ($this->upload->do_upload('tentang_kami_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_tentang_kami/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 710;
                    $config['height'] = 335;
                    $config['new_image'] = 'template/assets/gambar_tentang_kami/' . $gbr['file_name'];
                                        
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $this->watermark($gbr['file_name']);
                    $this->image_lib->clear();

                    $data = array(
                        'tentang_kami_nama' => $this->input->post('tentang_kami_nama', TRUE),
                        'tentang_kami_isi' => $this->input->post('tentang_kami_isi', TRUE),
                        'tentang_kami_gambar' => $gbr['file_name']
                    );
                }
            } else {
                $data = array(
                    'tentang_kami_nama' => $this->input->post('tentang_kami_nama', TRUE),
                    'tentang_kami_isi' => $this->input->post('tentang_kami_isi', TRUE)
                );
            }

            $this->Tentang_kami_model->insert_tentang_kami($data);
            $this->session->set_flashdata('message', 'Create Tentang Kami Record Success');
            redirect(site_url('admin/tentang_kami'));
        }
    }

    public function update($tentang_kami_id)
    {
        $row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_id($tentang_kami_id)->row();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/tentang_kami/update_action'),
                'tentang_kami_id' => set_value('tentang_kami_id', $row->tentang_kami_id),
                'tentang_kami_nama' => set_value('tentang_kami_nama', $row->tentang_kami_nama),
                'tentang_kami_isi' => set_value('tentang_kami_isi', $row->tentang_kami_isi),
                'tentang_kami_gambar_1' => set_value('tentang_kami_gambar', $row->tentang_kami_gambar),
                'js_extend' => "CKEDITOR.replace('tentang_kami_isi');",
                'page' => 'Tentang Kami'
            );
            $this->template->load('admin/admin_main_template', 'admin/view_tentang_kami_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tentang_kami'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tentang_kami_id', TRUE));
        } else {

            $config['upload_path'] = 'template/assets/gambar_tentang_kami/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if (! empty($_FILES['tentang_kami_gambar']['name'])) {
                if ($this->upload->do_upload('tentang_kami_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_tentang_kami/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 710;
                    $config['height'] = 335;
                    $config['new_image'] = 'template/assets/gambar_tentang_kami/' . $gbr['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $this->watermark($gbr['file_name']);
                    $this->image_lib->clear();

                    $data = array(
                        'tentang_kami_nama' => $this->input->post('tentang_kami_nama', TRUE),
                        'tentang_kami_isi' => $this->input->post('tentang_kami_isi', TRUE),
                        'tentang_kami_gambar' => $gbr['file_name']
                    );
                    $path_file = 'template/assets/gambar_tentang_kami/' . $this->input->post('tentang_kami_gambar_1', TRUE);
                    if (file_exists($path_file)) {
                        unlink($path_file);
                    }
                }
            } else {
                $data = array(
                    'tentang_kami_nama' => $this->input->post('tentang_kami_nama', TRUE),
                    'tentang_kami_isi' => $this->input->post('tentang_kami_isi', TRUE)
                );
            }

            $this->Tentang_kami_model->update_tentang_kami($this->input->post('tentang_kami_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Create Tentang Kami Record Success');
            redirect(site_url('admin/tentang_kami'));
        }
    }

    public function delete($tentang_kami_id)
    {
        $row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_id($tentang_kami_id)->row();

        if ($row) {
            $this->Tentang_kami_model->delete_tentang_kami($tentang_kami_id);
            $path_file = 'template/assets/gambar_tentang_kami/' . $row->tentang_kami_gambar;
            if (file_exists($path_file)) {
                unlink($path_file);
            }
            $this->session->set_flashdata('message', 'Delete Record Tentang Kami Success');
            redirect(site_url('admin/tentang_kami'));
        } else {
            $this->session->set_flashdata('message', 'Record Tentang Kami Not Found');
            redirect(site_url('admin/tentang_kami'));
        }
    }

    public function watermark($nama_file)
    {
        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image'] = 'template/assets/gambar_tentang_kami/' . $nama_file;
        $imgConfig['wm_text'] = 'Copyright ' . date('Y') . ' - Kampung Qur`an Cikarang';
        $imgConfig['wm_type'] = 'text';
        $imgConfig['wm_font_size'] = '12';
        $this->load->library('image_lib', $imgConfig);

        $this->image_lib->initialize($imgConfig);

        $this->image_lib->watermark();
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tentang_kami_nama', 'Nama', 'trim|required');

        /*
         * if (empty($_FILES['tentang_kami_gambar']['name'])) {
         * $this->form_validation->set_rules('tentang_kami_gambar', 'Gambar', 'required');
         * }
         */

        $this->form_validation->set_rules('tentang_kami_id', 'tentang_kami_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}