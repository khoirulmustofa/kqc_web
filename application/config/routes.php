<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'beranda';
$route['artikel/(:any)']='artikel/detail/$1';
$route['kirim_komentar']='artikel/insert_komentar';

// Tentang Kami
$route['manajemen']='tentang_kami/manajemen';
$route['sejarah']='tentang_kami/sejarah';
$route['visi-misi']='tentang_kami/visimisi';
$route['methode']='tentang_kami/methode';
$route['legal-formal']='tentang_kami/legal_formal';
$route['salam-pimpinan']='tentang_kami/salam_pimpinan';

// Program
$route['pendidikan-dakwah']='program/pendidikan_dakwah';
$route['sosial-kemanusian']='program/sosial_kemanusiaan';
$route['pengembangan-masyarakat']='program/pengembangan_masyarakat';
//$route['seeder']='artikel/seeder';

//Sedekah
$route['sedekah']='sedekah';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
