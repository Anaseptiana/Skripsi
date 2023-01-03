<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('administrator/auth');
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function checkActive($status)
{
    if ($status == 1) {
        return 'Aktif';
    } else {
        return 'Tidak Aktif';
    }
}

function checkStatusSupir($status)
{
    if ($status == 1) {
        return 'Tidak Tersedia';
    } else {
        return 'Tersedia';
    }
}

function input_post($input)
{
    return strip_tags(htmlspecialchars($input, ENT_QUOTES));
}

function is_logged_in_customer()
{
    $ci = get_instance();
    if (!$ci->session->userdata('customer')) {
        redirect('login');
    }
}

function numberFormat($harga)
{
    return number_format($harga, 0, ',', '.');
}

function statusPesanan($status)
{
    $text = "";
    if($status == 1){
        $text = "Menunggu Pembayaran";
    }elseif($status == 2){
        $text = "Pembayaran Sedang di Validasi";
    }elseif($status == 3){
        $text = "Lunas";
    }elseif($status == 4){
        $text = "Pembayaran ditolak";
    }else{
        $text = "Selesai";
    }

    return $text;
}

function listStatus()
{
    $data = [
        [
            'status' => 1,
            'text' => 'Menunggu Pembayaran',
        ],
        [
            'status' => 2,
            'text' => 'Pembayaran Sedang di Validasi',
        ],
        [
            'status' => 3,
            'text' => 'Lunas',
        ],
        [
            'status' => 4,
            'text' => 'Pembayaran ditolak',
        ],
        [
            'status' => 5,
            'text' => 'Selesai',
        ]
    ];

    return $data;
}

function statusSupir($status)
{
    if($status){
        return 'Ya';
    }

    return 'Tidak';
}

function convertDay($key)
{
    $day = [
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    ];

    return $day[$key];
}

function listNamaBulan()
{
    $arrNamaBulan = array("01"=>"Januari", "02"=>"Februari", "03"=>"Maret", "04"=>"April", "05"=>"Mei", "06"=>"Juni", "07"=>"Juli", "08"=>"Agustus", "09"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");

    return $arrNamaBulan;
}
