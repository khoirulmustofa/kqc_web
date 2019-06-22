<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['artikel/(:any)']='artikel/detail/$1';
$route['kirim_komentar']='artikel/insert_komentar';

// Tentang Kami
$route['manajemen']='tentang_kami/manajemen';
$route['sejarah']='tentang_kami/sejarah';
$route['visi-misi']='tentang_kami/visimisi';

// Program
$route['pendidikan-dakwah']='program/pendidikan_dakwah';
//$route['seeder']='artikel/seeder';

//Sedekah
$route['cara-sedekah']='sedekah/cara_sedekah';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
