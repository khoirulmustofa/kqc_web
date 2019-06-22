<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Sedekah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function cara_sedekah()
    {
        $data = array(
            'page' => "manajemen"
        );
        $this->template->load(template() . '/main_template', template() . '/view_cara_sedekah', $data);
    }
}