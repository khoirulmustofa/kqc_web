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
        $program_kategori = 'pendidikan-dan-dakwah';
        $start = intval($this->input->get('start'));
        $config['base_url'] = base_url() . 'pendidikan-dakwah/';
        $config['first_url'] = base_url() . 'pendidikan-dakwah/';
        $config['per_page'] = 1;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->get_total_rows_program_by_kategori($program_kategori);
        $program = $this->Program_model->get_program_by_kategori($config['per_page'], $start, $program_kategori)->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu' => "Program",
            'page'=>"Pendidikan dan Dakwah",
            'program_data' => $program,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_list', $data);
    }
    
    public function sosial_kemanusiaan()
    {
        $program_kategori = 'sosial-dan-kemanusian';
        $start = intval($this->input->get('start'));
        $config['base_url'] = base_url() . 'sosial-kemanusian/';
        $config['first_url'] = base_url() . 'sosial-kemanusian/';
        $config['per_page'] = 1;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->get_total_rows_program_by_kategori($program_kategori);
        $pendidikan_dakwah = $this->Program_model->get_program_by_kategori($config['per_page'], $start, $program_kategori)->result();
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'menu' => "Program",
            'page'=>"Sosial dan Kemanusiaan",
            'program_data' => $pendidikan_dakwah,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_list', $data);
    }
    
    public function pengembangan_masyarakat()
    {
        $program_kategori = 'pengembangan-masyarakat';
        $start = intval($this->input->get('start'));
        $config['base_url'] = base_url() . 'pengembangan-masyarakat/';
        $config['first_url'] = base_url() . 'pengembangan-masyarakat/';
        $config['per_page'] = 1;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_model->get_total_rows_program_by_kategori($program_kategori);
        $pendidikan_dakwah = $this->Program_model->get_program_by_kategori($config['per_page'], $start, $program_kategori)->result();
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'menu' => "Program",
            'page'=>"Sosial dan Kemanusiaan",
            'program_data' => $pendidikan_dakwah,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start
        );
        $this->template->load(template() . '/main_template', template() . '/view_program_list', $data);
    }
}