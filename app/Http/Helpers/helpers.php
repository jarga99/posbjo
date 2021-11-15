<?php

function change_dot ($number) {
    return number_format($number, 0, ',', '.');
}

function be_regraded ($number) {
    $number = abs($number);
    $read  = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
    $be_regraded = '';

    if ($number < 12) { // 0 - 11
        $be_regraded = ' ' . $read[$number];
    } elseif ($number < 20) { // 12 - 19
        $be_regraded = be_regraded($number -10) . ' belas';
    } elseif ($number < 100) { // 20 - 99
        $be_regraded = be_regraded($number / 10) . ' puluh' . be_regraded($number % 10);
    } elseif ($number < 200) { // 100 - 199
        $be_regraded = ' seratus' . be_regraded($number -100);
    } elseif ($number < 1000) { // 200 - 999
        $be_regraded = be_regraded($number / 100) . ' ratus' . be_regraded($number % 100);
    } elseif ($number < 2000) { // 1.000 - 1.999
        $be_regraded = ' seribu' . be_regraded($number -1000);
    } elseif ($number < 1000000) { // 2.000 - 999.999
        $be_regraded = be_regraded($number / 1000) . ' ribu' . be_regraded($number % 1000);
    } elseif ($number < 1000000000) { // 1000000 - 999.999.990
        $be_regraded = be_regraded($number / 1000000) . ' juta' . be_regraded($number % 1000000);
    }

    return $be_regraded;
}

function date_indo ($dte, $display_day = true)
{
    $name_day  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $name__month = array(1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $_year   = substr($dte, 0, 4);
    $_month   = $name__month[(int) substr($dte, 5, 2)];
    $date = substr($dte, 8, 2);
    $text    = '';

    if ($display_day) {
        $array_day = date('w', mktime(0,0,0, substr($dte, 5, 2), $date, $_year));
        $day        = $name_day[$array_day];
        $text       .= "$day, $date $_month $_year";
    } else {
        $text       .= "$date $_month $_year";
    }

    return $text;
}

function zero_on_front($value, $threshold = null)
{
    return sprintf("%0". $threshold . "s", $value);
}
