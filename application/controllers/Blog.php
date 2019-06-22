<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'page' => "artikel_list"
        );

        $this->template->load(template() . '/main_template', template() . '/view_artikel', $data);
    }
    
    public function test()
    {
        $q_artikel = $this->Artikel_model->get_limit_data_artikel('5', NULL, NULL,'2,1');
        print $q_artikel;
        
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
                'artikel_isi_berita' => $row->artikel_isi_berita,
                'artikel_hari' => $row->artikel_hari,
                'artikel_tanggal' => $row->artikel_tanggal,
                'artikel_jam' => $row->artikel_jam,
                'artikel_gambar' => $row->artikel_gambar,
                'artikel_dibaca' => $row->artikel_dibaca,
                'artikel_tag' => $row->artikel_tag,
                'kategori_id' => $row->kategori_id,
                'kategori_nama' => $row->kategori_nama,
                'kategori_seo' => $row->kategori_seo,
                'kategori_aktif' => $row->kategori_aktif,
                'page' => "artikel_detail"
            );
            
            $this->template->load(template() . '/main_template', template() . '/view_artikel_detail', $data);
        }
    }
    
    function get_artikel()
    {
        $keyword = urldecode($this->input->post('keyword', TRUE));

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($keyword);
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
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 5;

        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];

        $q_artikel = $this->Artikel_model->get_limit_data_artikel($config["per_page"], $start, $keyword);
        $output_row = '';
        if ($q_artikel->num_rows() > 0) {
            foreach ($q_artikel->result() as $row) {
                $output_row .= '
<article>
					<div class="row">
						<div class="col-md-5">
							<div class="post-image">
								<div class="flexslider">
									<div class="slides">
										<a data-id="' . $row->artikel_id. '" href="' . base_url('artikel/') . $row->artikel_judul_seo . '"><img
											src="'.base_url('template/').template().'/images/image07.jpg" /></a>										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="post-content">
								<h2>
									<a data-id="' . $row->artikel_id. '" href="' . base_url('artikel/') . $row->artikel_judul_seo . '"> ' . $row->artikel_judul . ' </a>
								</h2>
								<p>Euismod atras vulputate iltricies etri elit per conubia
									nostra, per inceptos himenaeos. Nulla nunc dui, tristique in
									semper vel, congue sed ligula. Nam dolor ligula, faucibus id
									sodales in, auctor fringilla libero. [...]</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="post-meta">
								<span><i class="fa fa-calendar"></i> January 11, 2014 </span> <span><i
									class="fa fa-user"></i> By <a href="#"> Peter Clark </a> </span>
								<span><i class="fa fa-tag"></i> <a href="#"> Bootstrap </a>, <a
									href="#"> Design </a> </span> <span><i class="fa fa-comments"></i>
									<a href="#"> 36 Comments </a></span> <a
									class="btn btn-xs btn-main-color pull-right"
									href="blog_post.html"> Read more... </a>
							</div>
						</div>
					</div>
				</article>';
            }
        } else {
            $output_row .= '<p>Kata kunci ' . $keyword . ' yang anda cari tidak ada dalam artikel KQC <a href="' . base_url('artikel') . '">Klik Disini Untuk Semua Artikel</a> </p>';
        }

        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'artikel_data' => $output_row
        );
        echo json_encode($output);
    }
    
    public function insert_komentari()
    {
        
        echo "01"; exit;
        /* $data = array(
         'artikel_id' => $this->input->post('artikel_id'),
         'komentar_nama' => $this->input->post('komentar_nama'),
         'komentar_email' => $this->input->post('komentar_email'),
         'komentar_isi' => $this->input->post('komentar_isi'),
         'komentar_waktu' => date("Y-m-d H:i:s"),
         'komentar_aktif' => 'N'
         ); */
         //$simpan = $this->Komentar_model->insert_komentar($data);
        
        
        /* $data = array(
            'artikel_id' => '99',
            'komentar_nama' => 'hallo',
            'komentar_email' => 'hallo',
            'komentar_isi' => 'hallo',
            'komentar_waktu' => date("Y-m-d H:i:s"),
            'komentar_aktif' => 'N'
        );
        $this->Komentar_model->insert_komentar($data);
        echo json_encode(array("status" => TRUE)); */
    }
    
    public function get_komentar($artikel_id)
    {
        $q_artikel = $this->Komentar_model->get_komentar_by_artikel_id($artikel_id);
        $output_row = '';
        if ($q_artikel->num_rows() > 0) {
            foreach ($q_artikel->result() as $row) {
                $output_row .= '
<div class="media">
												<a class="pull-left" href="#">
													<img class="media-object" alt="" src="'.base_url('template/').template().'/images/avatar-4.jpg">
												</a>
												<div class="media-body">
													<h5 class="media-heading">'.$row->komentar_nama.'</h5>
													<span class="pull-right"> <span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span> </span>
													<p>'.$row->komentar_isi.'</p>
													<span class="date pull-right">January 12, 2014 at 1:38 pm</span>
												</div>
											</div>';
            }
        }
        $output = array(
            'komentar_data' => $output_row
        );
        echo json_encode($output);
    }
}