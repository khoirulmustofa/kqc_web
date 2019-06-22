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
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_beranda', $data);
    }
}