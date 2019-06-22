<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $cari = urldecode($this->input->get('cari', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($cari <> '') {
            $config['base_url'] = base_url() . 'artikel/?cari=' . urlencode($cari);
            $config['first_url'] = base_url() . 'artikel/?cari=' . urlencode($cari);
        } else {
            $config['base_url'] = base_url() . 'artikel/';
            $config['first_url'] = base_url() . 'artikel/';
        }
        
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows_artikel($cari,NULL,NULL);
        $artikel = $this->Artikel_model->get_limit_data_artikel($config['per_page'], $start, $cari,NULL,NULL)->result();
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'artikel_data' => $artikel,
            'cari' => $cari,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('admin/admin_main_template', 'admin/view_artikel_list', $data);
    }
}