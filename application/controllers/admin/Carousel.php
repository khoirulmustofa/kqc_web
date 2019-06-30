<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Carousel extends CI_Controller
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
            $config['base_url'] = base_url() . 'admin/carousel/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'admin/carousel/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'admin/carousel/';
            $config['first_url'] = base_url() . 'admin/carousel/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Carousel_model->total_rows_carousel($cari);
        $carousel = $this->Carousel_model->get_limit_data_carousel($config['per_page'], $start, $cari)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'button' => 'List',
            'carousel_data' => $carousel,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page' => 'Carousel'
        );
        $this->template->load('admin/admin_main_template', 'admin/view_carousel_list', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('admin/carousel/create_action'),
            'carousel_id' => set_value('carousel_id'),
            'carousel_nama' => set_value('carousel_nama'),
            'carousel_gambar_1' => set_value('carousel_gambar'),
            'carousel_link' => set_value('carousel_link'),
            'page' => 'Carousel'
        );

        $this->template->load('admin/admin_main_template', 'admin/view_carousel_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path'] = 'template/assets/gambar_carousel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if (! empty($_FILES['carousel_gambar']['name'])) {
                if ($this->upload->do_upload('carousel_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_carousel/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 1000;
                    $config['height'] = 350;
                    $config['new_image'] = 'template/assets/gambar_carousel/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                        'carousel_nama' => $this->input->post('carousel_nama', TRUE),
                        'carousel_gambar' => $gbr['file_name'],
                        'carousel_link' => $this->input->post('carousel_link', TRUE)
                    );
                }
            } else {
                $data = array(
                    'carousel_nama' => $this->input->post('carousel_nama', TRUE),
                    'carousel_link' => $this->input->post('carousel_link', TRUE)
                );
            }

            $this->Carousel_model->insert_carousel($data);
            $this->session->set_flashdata('message', 'Create carousel Record Success');
            redirect(site_url('admin/carousel'));
        }
    }

    public function update($carousel_id)
    {
        $row = $this->Carousel_model->get_carousel_by_carousel_id($carousel_id)->row();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/carousel/update_action'),
                'carousel_id' => set_value('carousel_id', $row->carousel_id),
                'carousel_nama' => set_value('carousel_nama', $row->carousel_nama),
                'carousel_gambar_1' => set_value('carousel_gambar', $row->carousel_gambar),
                'carousel_link' => set_value('carousel_link', $row->carousel_link),
                'page' => 'Carousel'
            );
            $this->template->load('admin/admin_main_template', 'admin/view_carousel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/carousel'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('carousel_id', TRUE));
        } else {

            $config['upload_path'] = 'template/assets/gambar_carousel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if (! empty($_FILES['carousel_gambar']['name'])) {
                if ($this->upload->do_upload('carousel_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_carousel/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 690;
                    $config['height'] = 320;
                    $config['new_image'] = 'template/assets/gambar_carousel/' . $gbr['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $this->watermark($gbr['file_name']);
                    $this->image_lib->clear();

                    $data = array(
                        'carousel_nama' => $this->input->post('carousel_nama', TRUE),
                        'carousel_gambar' => $gbr['file_name'],
                        'carousel_link' => $this->input->post('carousel_link', TRUE)
                    );
                    $path_file = 'template/assets/gambar_carousel/' . $this->input->post('carousel_gambar_1', TRUE);
                    if (file_exists($path_file)) {
                        unlink($path_file);
                    }
                }
            } else {
                $data = array(
                    'carousel_nama' => $this->input->post('carousel_nama', TRUE),
                    'carousel_link' => $this->input->post('carousel_link', TRUE)
                );
            }

            $this->Carousel_model->update_carousel($this->input->post('carousel_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Create carousel Record Success');
            redirect(site_url('admin/carousel'));
        }
    }

    public function delete($carousel_id)
    {
        $row = $this->Carousel_model->get_carousel_by_carousel_id($carousel_id)->row();

        if ($row) {
            $this->Carousel_model->delete_carousel($carousel_id);
            $path_file = 'template/assets/gambar_carousel/' . $row->carousel_gambar;
            if (file_exists($path_file)) {
                unlink($path_file);
            }
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/carousel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/carousel'));
        }
    }

    public function watermark($nama_file)
    {
        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image'] = 'template/assets/gambar_carousel/' . $nama_file;
        $imgConfig['wm_text'] = 'Copyright ' . date('Y') . ' - Kampung Qur`an Cikarang';
        $imgConfig['wm_type'] = 'text';
        $imgConfig['wm_font_size'] = '12';
        $this->load->library('image_lib', $imgConfig);

        $this->image_lib->initialize($imgConfig);

        $this->image_lib->watermark();
    }

    public function _rules()
    {
        $this->form_validation->set_rules('carousel_nama', 'Nama', 'trim|required');
        if (empty($_FILES['carousel_gambar']['name'])) {
            $this->form_validation->set_rules('carousel_gambar', 'Gambar', 'required');
        }
        $this->form_validation->set_rules('carousel_link', 'Link', 'trim|required');

        $this->form_validation->set_rules('carousel_id', 'carousel_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}