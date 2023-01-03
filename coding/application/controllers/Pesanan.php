<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
            $this->db->where('tanggal_pesan BETWEEN "'. date('Y-m-d', strtotime($this->input->get('dari'))). '" and "'. date('Y-m-d', strtotime($this->input->get('sampai'))).'"');
            $text_date = date('d M Y', strtotime($_GET['dari'])) ." - ".date('d M Y', strtotime($_GET['sampai']));
        }
        $data['pesanans'] = $this->db->select('pesanan.*, customer.nama_customer')
                                      ->join('customer', 'customer.id_customer = pesanan.id_customer')
                                      ->order_by('id_pesanan', 'DESC')->get('pesanan')
                                      ->result_array();

        $data['title'] = 'Pesanan '.$text_date;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_pesanan)
    {
        $data['title'] = 'Detail Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->db->select('pesanan.*, customer.nama_customer')
                                    ->join('customer', 'customer.id_customer = pesanan.id_customer')
                                    ->get_where('pesanan', ['pesanan.id_pesanan' => $id_pesanan])->row_array();
        $data['konfirmasi_pesanan'] = $this->db->get_where('konfirmasi_pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        $data['list_supir'] = $this->db->get('supir')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_pesanan)
    {
        $data['title'] = 'Detail Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->db->select('pesanan.*, customer.nama_customer')
                                    ->join('customer', 'customer.id_customer = pesanan.id_customer')
                                    ->get_where('pesanan', ['pesanan.id_pesanan' => $id_pesanan])->row_array();
        $data['konfirmasi_pesanan'] = $this->db->get_where('konfirmasi_pesanan', ['id_pesanan' => $id_pesanan])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function update($id_pesanan)
    {

        $id_supir = '';
        $nama_supir = '';
        if($this->input->post('id_supir') != ''){
            $id_supir = $this->input->post('id_supir');
            $supir = $this->db->get_where('supir', ['id_supir' => $id_supir])->row_array();
            $nama_supir = $supir['nama_supir'];
        }

        $data = [
            'id_supir' => $id_supir,
            'nama_supir' => $nama_supir,
            'status' => $this->input->post('status')
        ];
        $this->db->update('pesanan', $data, ['id_pesanan' => $id_pesanan]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil diupdate!</div>');

        redirect('administrator/pesanan');
    }
}
