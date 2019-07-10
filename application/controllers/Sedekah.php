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
        $data = array(
            'menu' => "Sedekah",
            'page' => "Cara Sedekah",
        );
        $this->template->load(template() . '/main_template', template() . '/view_sedekah', $data);
    }
}