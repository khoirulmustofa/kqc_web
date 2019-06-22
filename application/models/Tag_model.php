<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Tag_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_tag()
    {
        $this->db->order_by('tag_nama', 'ASC');
        return $this->db->get('tag');
    }
}