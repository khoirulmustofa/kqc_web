<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->library('image_lib');
        $this->load->library('upload');
        
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
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel_admin($cari);
        $artikel = $this->Artikel_model->get_limit_data_artikel_admin($config['per_page'], $start, $cari)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'button' => 'List',
            'artikel_data' => $artikel,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page'=>'Artikel'
        );
        $this->template->load('admin/admin_main_template', 'admin/view_artikel_list', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Buat',
            'judul_artikel' => 'Hallo0',
            'action' => site_url('admin/artikel/create_action'),
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
            'tag_data' => $this->Tag_model->get_all_tag()->result(),
            'js_extend' => "CKEDITOR.replace('artikel_isi');",
            'page'=>'Artikel'
        );

        $this->template->load('admin/admin_main_template', 'admin/view_artikel_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path'] = 'template/assets/gambar_artikel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if ($this->input->post('artikel_tag') != '') {
                $tag_seo = $this->input->post('artikel_tag');
                $tag = implode(',', $tag_seo);
            } else {
                $tag = '';
            }

            if (! empty($_FILES['artikel_gambar']['name'])) {
                if ($this->upload->do_upload('artikel_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_artikel/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 690;
                    $config['height'] = 320;
                    $config['new_image'] = 'template/assets/gambar_artikel/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                        'kategori_id' => $this->input->post('kategori_id', TRUE),
                        'artikel_username' => "Administrator",
                        'artikel_judul' => $this->input->post('artikel_judul', TRUE),
                        'artikel_judul_seo' => seo_title($this->input->post('artikel_judul', TRUE)),
                        'artikel_isi' => $this->input->post('artikel_isi', TRUE),
                        'artikel_hari' => hari_ini(date('w')),
                        'artikel_tanggal' => date("Y-m-d H:i:s"),
                        'artikel_gambar' => $gbr['file_name'],
                        'artikel_view' => '0',
                        'artikel_tag' => $tag
                    );
                }
            } else {
                $data = array(
                    'kategori_id' => $this->input->post('kategori_id', TRUE),
                    'artikel_username' => "Administrator",
                    'artikel_judul' => $this->input->post('artikel_judul', TRUE),
                    'artikel_judul_seo' => seo_title($this->input->post('artikel_judul', TRUE)),
                    'artikel_isi' => $this->input->post('artikel_isi', TRUE),
                    'artikel_hari' => hari_ini(date('w')),
                    'artikel_tanggal' => date("Y-m-d H:i:s"),
                    'artikel_view' => '0',
                    'artikel_tag' => $tag
                );
            }

            $this->Artikel_model->insert_artikel($data);
            $this->session->set_flashdata('message', 'Create artikel Record Success');
            redirect(site_url('admin/artikel'));
        }
    }

    public function update($artikel_id)
    {
        $row = $this->Artikel_model->get_artikel_by_artikel_id($artikel_id)->row();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/artikel/update_action'),
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
                'artikel_tag' => set_value('artikel_tag', $row->artikel_tag),
                'tag_data' => $this->Tag_model->get_all_tag()->result(),
                'js_extend' => "CKEDITOR.replace('artikel_isi');",
                'page'=>'Artikel'
            );
            $this->template->load('admin/admin_main_template', 'admin/view_artikel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/artikel'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('artikel_id', TRUE));
        } else {

            $config['upload_path'] = 'template/assets/gambar_artikel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            if ($this->input->post('artikel_tag') != '') {
                $tag_seo = $this->input->post('artikel_tag');
                $tag = implode(',', $tag_seo);
            } else {
                $tag = '';
            }

            if (! empty($_FILES['artikel_gambar']['name'])) {
                if ($this->upload->do_upload('artikel_gambar')) {
                    $gbr = $this->upload->data();
                    // Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'template/assets/gambar_artikel/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 690;
                    $config['height'] = 320;
                    $config['new_image'] = 'template/assets/gambar_artikel/' . $gbr['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $this->watermark($gbr['file_name']);
                    $this->image_lib->clear();

                    $data = array(
                        'kategori_id' => $this->input->post('kategori_id', TRUE),
                        'artikel_username' => "Administrator",
                        'artikel_judul' => $this->input->post('artikel_judul', TRUE),
                        'artikel_judul_seo' => seo_title($this->input->post('artikel_judul', TRUE)),
                        'artikel_isi' => $this->input->post('artikel_isi', TRUE),
                        'artikel_hari' => hari_ini(date('w')),
                        'artikel_tanggal' => date("Y-m-d H:i:s"),
                        'artikel_gambar' => $gbr['file_name'],
                        'artikel_view' => '0',
                        'artikel_tag' => $tag
                    );
                    $path_file = 'template/assets/gambar_artikel/' . $this->input->post('artikel_gambar_1', TRUE);
                    if (file_exists($path_file)) {
                        unlink($path_file);
                    }
                }
            } else {
                $data = array(
                    'kategori_id' => $this->input->post('kategori_id', TRUE),
                    'artikel_username' => "Administrator",
                    'artikel_judul' => $this->input->post('artikel_judul', TRUE),
                    'artikel_judul_seo' => seo_title($this->input->post('artikel_judul', TRUE)),
                    'artikel_isi' => $this->input->post('artikel_isi', TRUE),
                    'artikel_hari' => hari_ini(date('w')),
                    'artikel_tanggal' => date("Y-m-d H:i:s"),
                    'artikel_view' => '0',
                    'artikel_tag' => $tag
                );
            }

            $this->Artikel_model->update_artikel($this->input->post('artikel_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Create artikel Record Success');
            redirect(site_url('admin/artikel'));
        }
    }

    public function delete($artikel_id)
    {
        $row = $this->Artikel_model->get_by_id($artikel_id);

        if ($row) {
            $this->Artikel_model->delete_artikel($artikel_id);
            $path_file = 'template/assets/gambar_artikel/' . $row->artikel_gambar;
            if (file_exists($path_file)) {
                unlink($path_file);
            }
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/artikel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/artikel'));
        }
    }

    public function watermark($nama_file)
    {
        $imgConfig = array();
        $imgConfig['image_library'] = 'GD2';
        $imgConfig['source_image'] = 'template/assets/gambar_artikel/' . $nama_file;
        $imgConfig['wm_text'] = 'Copyright ' . date('Y') . ' - Kampung Qur`an Cikarang';
        $imgConfig['wm_type'] = 'text';
        $imgConfig['wm_font_size'] = '12';
        $this->load->library('image_lib', $imgConfig);

        $this->image_lib->initialize($imgConfig);

        $this->image_lib->watermark();
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kategori_id', 'kategori', 'trim|required');
        $this->form_validation->set_rules('artikel_judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('artikel_isi', 'Isi Artikel', 'trim|required');
        $this->form_validation->set_rules('artikel_gambar', 'Gambar');
        $this->form_validation->set_rules('artikel_tag', 'Tag');

        $this->form_validation->set_rules('artikel_id', 'artikel_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}