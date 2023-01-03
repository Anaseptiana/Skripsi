<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
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
            $this->db->where('tanggal BETWEEN "'. date('Y-m-d', strtotime($this->input->get('dari'))). '" and "'. date('Y-m-d', strtotime($this->input->get('sampai'))).'"');
            $text_date = date('d M Y', strtotime($_GET['dari'])) ." - ".date('d M Y', strtotime($_GET['sampai']));
        }
        
        $data['title'] = 'Pengeluaran '.$text_date;
        $data['pengeluaran'] = $this->db->get('pengeluaran')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengeluaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pengeluaran', 'Nama Pengeluaran', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengeluaran/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_pengeluaran' => $this->input->post('nama_pengeluaran', true),
                'jumlah' => $this->input->post('jumlah', true),
                'tanggal' => $this->input->post('tanggal', true),
            ];

            $this->db->insert('pengeluaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengeluaran berhasil ditambahkan!</div>');
            redirect('administrator/pengeluaran');
        }
    }

    public function edit($id_pengeluaran)
    {
        $data['title'] = 'Edit Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengeluaran'] = $this->db->get_where('pengeluaran', ['id_pengeluaran' => $id_pengeluaran])->row_array();

        $this->form_validation->set_rules('nama_pengeluaran', 'Nama Pengeluaran', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengeluaran/edit', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_pengeluaran' => $this->input->post('nama_pengeluaran', true),
                'jumlah' => $this->input->post('jumlah', true),
                'tanggal' => $this->input->post('tanggal', true),
            ];

            $this->db->update('pengeluaran', $data, ['id_pengeluaran' => $id_pengeluaran]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengeluaran berhasil diubah!</div>');
            redirect('administrator/pengeluaran');
        }
    }

    function hapus($id_pengeluaran)
    {
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        $this->db->delete('pengeluaran');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengeluaran berhasil dihapus!</div>');
        redirect('administrator/pengeluaran');
    }
}
