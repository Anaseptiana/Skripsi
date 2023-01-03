<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Setting Website';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['setting'] = $this->db->get('setting')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('setting/kontak/index', $data);
        $this->load->view('templates/footer');
    }

    public function update_setting()
    {
        $nama_website = strip_tags(htmlspecialchars($this->input->post('nama_website', TRUE), ENT_QUOTES));
        $email = strip_tags(htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES));
        $telp = strip_tags(htmlspecialchars($this->input->post('telp', TRUE), ENT_QUOTES));
        $whatsapp = strip_tags(htmlspecialchars($this->input->post('whatsapp', TRUE), ENT_QUOTES));
        $facebook = strip_tags(htmlspecialchars($this->input->post('facebook', TRUE), ENT_QUOTES));
        $twitter = strip_tags(htmlspecialchars($this->input->post('twitter', TRUE), ENT_QUOTES));
        $harga_supir_dalam_kota = strip_tags(htmlspecialchars($this->input->post('harga_supir_dalam_kota', TRUE), ENT_QUOTES));
        $harga_supir_luar_kota = strip_tags(htmlspecialchars($this->input->post('harga_supir_luar_kota', TRUE), ENT_QUOTES));

        $data = [
            'nama_website' => $nama_website,
            'email' => $email,
            'telp' => $telp,
            'whatsapp' => $whatsapp,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'harga_supir_dalam_kota' => $harga_supir_dalam_kota,
            'harga_supir_luar_kota' => $harga_supir_luar_kota,
        ];

        $this->db->update('setting', $data, ['id_setting' => 1]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Setting berhasil disimpan</div>');
        redirect('administrator/setting');
    }
}
