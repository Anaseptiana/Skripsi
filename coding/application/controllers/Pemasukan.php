<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $text_date = '';
        if($this->input->get('dari') && $this->input->get('sampai')){
            $this->db->where('tanggal_selesai BETWEEN "'. date('Y-m-d', strtotime($this->input->get('dari'))). '" and "'. date('Y-m-d', strtotime($this->input->get('sampai'))).'"');
            $text_date = date('d M Y', strtotime($_GET['dari'])) ." - ".date('d M Y', strtotime($_GET['sampai']));
        }

        $data['title'] = 'Pemasukan '.$text_date;

        $data['pemasukan'] = $this->db->where('status', 5)
                                      ->get('pesanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemasukan/index', $data);
        $this->load->view('templates/footer');
    }

}
