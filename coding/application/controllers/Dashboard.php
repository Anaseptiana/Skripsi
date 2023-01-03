<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_mobil'] =  $this->db->select('id_mobil, nama_mobil, COUNT(id_mobil) as total_mobil')
                            ->group_by('id_mobil')
                            ->order_by('total_mobil', 'desc') 
                            ->where('status', 5)   
                            ->get('pesanan', 5)
                            ->result_array();

        $data['data_pesanan'] = $this->db->select('count(id_pesanan) as total_pesanan, SUM(total_harga) as total_harga')
                            ->where('status', 5)    
                            ->get('pesanan')
                            ->row_array();

        $data['data_customer'] = $this->db->select('count(id_customer) as total_customer')
                                          ->get('customer')
                                          ->row_array();
        
        $data['data_pengeluaran'] = $this->db->select('SUM(jumlah) as total_jumlah')
                                             ->get('pengeluaran')
                                             ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
