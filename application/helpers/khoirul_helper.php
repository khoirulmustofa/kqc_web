<?php

// untuk ambil tempate yang aktif
function template()
{
    return "adminlte";
}

function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

function show_tag($string)
{
    return ucwords(str_replace("-", " ", $string));
}

function tag_explode($tags)
{
    $hasil = explode(',', $tags);
    return $hasil;
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function tgl_lengkap($tgl)
{
    $tahun = substr($tgl, 0, 4);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tanggal = substr($tgl, 8, 2);
    $jam = substr($tgl, 11, 2);
    $menit = substr($tgl, 14, 2);
    $detik = substr($tgl, 17, 2);
    
    return $tanggal . ' ' . $bulan . ' ' . $tahun. ' ' .$jam. ':' .$menit. ':' .$detik;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}