<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_ajax extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'page' => "artikel_list",
            'kategori_data' => $this->Kategori_model->get_all_kategori()->result()
        );
        $this->template->load(template() . '/main_template', template() . '/view_artikel', $data);
    }

    function get_artikel()
    {
        $keyword = urldecode($this->input->post('keyword', TRUE));
        $kategori = $this->input->post('kategori', TRUE);

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($keyword, $kategori);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;

        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];

        $q_artikel = $this->Artikel_model->get_limit_data_artikel($config["per_page"], $start, $keyword, $kategori);
        $output_row = '';
        if ($q_artikel->num_rows() > 0) {
            foreach ($q_artikel->result() as $row) {
                $output_row .= '<div class="box box-success">
					<div class="box-body">
						<a href="' . site_url('artikel') . '/' . strtolower($row->artikel_judul_seo) . '"><img class="img-responsive pad"
							src="' . base_url('template/') . template() . '/dist/img/photo2.png"
							alt="Photo"></a>
							    
							    
						<div class="user-block">
							<img class="img-circle img-bordered-sm"
								src="' . site_url('template/') . template() . '/dist/img/user6-128x128.jpg"
								alt="User Image"> <span class="username"> Adam Jones </span> <span><i
								class="fa fa-fw fa-clock-o"></i>' . tgl_indo($row->artikel_tanggal) . ' | </span><span><i
								class="fa fa-fw fa-eye"></i> ' . $row->artikel_view . ' di lihat | </span>
                                <span>Kategori : ' . $row->kategori_nama . '</span>
                                    
						</div>
						<h2 class="page-header">
							<a href="' . site_url('artikel') . '/' . strtolower($row->artikel_judul_seo) . '">' . ucwords($row->artikel_judul) . '</a>
						</h2>
						<p>' . limit_words($row->artikel_isi, 30) . ' ...</p>
						<a href="' . site_url('artikel') . '/' . strtolower($row->artikel_judul_seo) . '">Read More <i
							class="fa fa-fw fa-folder-open-o"></i></a>
					</div>
				</div>';
            }
        } else {
            $output_row .= '<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Maaf !!!</h3>
                
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-fw fa-hourglass-o"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Kata kunci ' . $keyword . ' yang anda cari tidak ada dalam artikel KQC <a href="' . base_url('artikel') . '">Klik Disini Untuk Semua Artikel</a> </p>
            </div>
            <!-- /.box-body -->
          </div>';
        }

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'artikel_data' => $output_row,
            'kategori_data' => $kategori
        );
        echo json_encode($output);
    }

    public function detail($artikel_judul_seo)
    {
        $q_artikel_by_seo = $this->Artikel_model->get_artikel_by_judul_seo($artikel_judul_seo);
        if ($q_artikel_by_seo->num_rows() > 0) {
            $row = $q_artikel_by_seo->row();
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
                'list_komentar' => $this->Komentar_model->get_komentar_by_artikel_id($row->artikel_id),
                'kategori_data' => $this->Kategori_model->get_all_kategori()->result(),
                'page' => "artikel_detail"
            );
            $this->template->load(template() . '/main_template', template() . '/view_artikel_detail', $data);

            $output_row = '';
        } else {
            $this->template->load(template() . '/main_template', template() . '/view_artikel_empty', NULL);
        }
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

    public function seeder()
    {
        $row_data = $this->db->get('artikel')->result();
        foreach ($row_data as $row) {
            $data = array(
                'artikel_id' => $row->artikel_id,
                'kategori_id' => $row->kategori_id,
                'artikel_username' => $row->artikel_username,
                'artikel_judul' => $row->artikel_judul . ' ' . $row->artikel_id,
                'artikel_judul_seo' => $row->artikel_judul_seo . '-' . $row->artikel_id,
                'artikel_isi' => $row->artikel_isi,
                'artikel_hari' => $row->artikel_hari,
                'artikel_tanggal' => $row->artikel_tanggal,
                'artikel_gambar' => $row->artikel_gambar,
                'artikel_tag' => $row->artikel_tag
            );
            $this->Artikel_model->update_artikel($row->artikel_id, $data);
        }
    }
}