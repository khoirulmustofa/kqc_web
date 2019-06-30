<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'menu' => "Home",
            'page' => "Beranda",
            'start' => intval($this->input->get('start')),
            'start_generic' => intval($this->input->get('start_generic')),
            'artikel_kategori_kabar_data' => $this->Artikel_model->get_artikel_by_kategori_top3('kabar-kqc')->result(),
            'artikel_kategori_inspirasi_data' => $this->Artikel_model->get_artikel_by_kategori_top3('inspirasi')->result(),
            'carousel_data'=>$this->Carousel_model->get_all_carousel()->result(),
        );
        $this->template->load(template() . '/main_template', template() . '/view_beranda', $data);
    }
}