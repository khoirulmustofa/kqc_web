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

    return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam . ':' . $menit . ':' . $detik;
}

function seo_title($s)
{
    $c = array(
        ' '
    );
    $d = array(
        '-',
        '/',
        '\\',
        ',',
        '.',
        '#',
        ':',
        ';',
        '\'',
        '"',
        '[',
        ']',
        '{',
        '}',
        ')',
        '(',
        '|',
        '`',
        '~',
        '!',
        '@',
        '%',
        '$',
        '^',
        '&',
        '*',
        '=',
        '?',
        '+',
        '–'
    );
    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

function hari_ini()
{
    date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
    $seminggu = array(
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    );
    $hari = date("w");
    return $seminggu[$hari];
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

function cmb_dinamis($name, $table, $field, $pk, $selected, $pilihan)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'> <option value='' selected> $pilihan </option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}