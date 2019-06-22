<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Hubungi_kami extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'page' => "artikel_list",
            'Hallo' => "jj"
        );
        $this->template->load(template() . '/main_template', template() . '/view_hubungi_kami', $data);
    }
}