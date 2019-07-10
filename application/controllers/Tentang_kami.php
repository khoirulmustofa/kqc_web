<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang_kami extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function manajemen()
    {
        $tentang_kami_row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_seo('manajemen-kampung-quran-cikarang');
        if ($tentang_kami_row) {
            $data = array(
                'menu' => "Tentang_kami",
                'page' => "Manajemen",
                'tentang_kami_id' => $tentang_kami_row->tentang_kami_id,
                'tentang_kami_nama' => $tentang_kami_row->tentang_kami_nama,
                'tentang_kami_isi' => $tentang_kami_row->tentang_kami_isi,
                'tentang_kami_gambar' => $tentang_kami_row->tentang_kami_gambar,
            );
            $this->template->load(template() . '/main_template', template() . '/view_tentang_kami', $data);
        }else {
            show_404();
        }
    }

    public function sejarah()
    {
        $tentang_kami_row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_seo('sejarah-kampung-quran-cikarang');
        if ($tentang_kami_row) {
            $data = array(
                'menu' => "Tentang_kami",
                'page' => "Sejarah Kampung Qur'an Cikarang",
                'tentang_kami_id' => $tentang_kami_row->tentang_kami_id,
                'tentang_kami_nama' => $tentang_kami_row->tentang_kami_nama,
                'tentang_kami_isi' => $tentang_kami_row->tentang_kami_isi,
                'tentang_kami_gambar' => $tentang_kami_row->tentang_kami_gambar,
            );
            $this->template->load(template() . '/main_template', template() . '/view_tentang_kami', $data);
        }else {
            show_404();
        }
    }

    public function visimisi()
    {
        $tentang_kami_row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_seo('visi-misi-kampung-quran-cikarang');
        if ($tentang_kami_row) {
            $data = array(
                'menu' => "Tentang_kami",
                'page' => "Visi Misi Kampung Qur'an Cikarang",
                'tentang_kami_id' => $tentang_kami_row->tentang_kami_id,
                'tentang_kami_nama' => $tentang_kami_row->tentang_kami_nama,
                'tentang_kami_isi' => $tentang_kami_row->tentang_kami_isi,
                'tentang_kami_gambar' => $tentang_kami_row->tentang_kami_gambar,
            );
            $this->template->load(template() . '/main_template', template() . '/view_tentang_kami', $data);
        }else {
            show_404();
        }
    }

    public function methode()
    {
        $tentang_kami_row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_seo('kampung-quran-cikarang-method');
        if ($tentang_kami_row) {
            $data = array(
                'menu' => "Tentang_kami",
                'page' => "Visi Misi Kampung Qur'an Cikarang",
                'tentang_kami_id' => $tentang_kami_row->tentang_kami_id,
                'tentang_kami_nama' => $tentang_kami_row->tentang_kami_nama,
                'tentang_kami_isi' => $tentang_kami_row->tentang_kami_isi,
                'tentang_kami_gambar' => $tentang_kami_row->tentang_kami_gambar,
            );
            $this->template->load(template() . '/main_template', template() . '/view_tentang_kami', $data);
        }else {
            show_404();
        }
    }

    public function legal_formal()
    {
        $tentang_kami_row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_seo('legal-formal-kampung-quran-cikarang');
        if ($tentang_kami_row) {
            $data = array(
                'menu' => "Tentang_kami",
                'page' => "Legal Formal Kampung Qur'an Cikarang",
                'tentang_kami_id' => $tentang_kami_row->tentang_kami_id,
                'tentang_kami_nama' => $tentang_kami_row->tentang_kami_nama,
                'tentang_kami_isi' => $tentang_kami_row->tentang_kami_isi,
                'tentang_kami_gambar' => $tentang_kami_row->tentang_kami_gambar,
            );
            $this->template->load(template() . '/main_template', template() . '/view_tentang_kami', $data);
        }else {
            show_404();
        }
    }

    public function salam_pimpinan()
    {
        $tentang_kami_row = $this->Tentang_kami_model->get_tentang_kami_by_tentang_kami_seo('salam-pimpinan-kampung-quran-cikarang');
        if ($tentang_kami_row) {
            $data = array(
                'menu' => "Tentang_kami",
                'page' => "Salam Pimpinan Kampung Qur'an Cikarang",
                'tentang_kami_id' => $tentang_kami_row->tentang_kami_id,
                'tentang_kami_nama' => $tentang_kami_row->tentang_kami_nama,
                'tentang_kami_isi' => $tentang_kami_row->tentang_kami_isi,
                'tentang_kami_gambar' => $tentang_kami_row->tentang_kami_gambar,
            );
            $this->template->load(template() . '/main_template', template() . '/view_tentang_kami', $data);
        }else {
            show_404();
        }
    }
}
