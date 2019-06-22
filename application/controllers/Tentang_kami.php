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
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_manajemen', $data);
    }

    public function sejarah()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_sejarah', $data);
    }

    public function visimisi()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_visimisi', $data);
    }

    public function methode()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_manajemen', $data);
    }

    public function legal_formal()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_manajemen', $data);
    }

    public function salam_pimpinan()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_manajemen', $data);
    }
}
