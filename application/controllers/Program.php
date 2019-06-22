<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Program extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function pendidikan_dakwah()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_pendidikan_dakwah', $data);
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
    
    public function detail()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_detail', $data);
    }
}