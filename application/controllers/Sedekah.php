<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Sedekah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rekening_sedekah = $this->Rekening_sedekah_model->get_all_rekening_sedekah()->result();
        $data = array(
            'menu' => "Sedekah",
            'page' => "Sedekah",
            'rekening_sedekah_data' => $rekening_sedekah
        );
        $this->template->load(template() . '/main_template', template() . '/view_sedekah', $data);
    }
}