<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Customer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customers'] = $this->db->get('customer')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Customer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_customer', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'No. HP', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('customer/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_customer' => htmlspecialchars($this->input->post('nama_customer', true)),
                'email' => $this->input->post('email', true),
                'telp' => $this->input->post('telp', true),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->db->insert('customer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Customer berhasil ditambahkan!</div>');
            redirect('administrator/customer');
        }
    }

    public function edit($id_customer)
    {
        $data['title'] = 'Edit Customer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->db->get_where('customer', ['id_customer' => $id_customer])->row_array();

        $this->form_validation->set_rules('nama_customer', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'No. HP', 'trim|required');

        if($this->input->post('email', true) == $data['customer']['email']){
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        }else{
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]', [
                'is_unique' => 'This email has already registered!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('customer/edit', $data);
            $this->load->view('templates/footer');
        }else{
            $password = ($this->input->post('password1') != '') ? password_hash($this->input->post('password1'), PASSWORD_DEFAULT) : $data['customer']['password'];
            $data = [
                'nama_customer' => htmlspecialchars($this->input->post('nama_customer', true)),
                'email' => $this->input->post('email', true),
                'telp' => $this->input->post('telp', true),
                'foto' => 'default.jpg',
                'password' => $password,
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->db->update('customer', $data, ['id_customer' => $id_customer]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Customer berhasil diubah!</div>');
            redirect('administrator/customer');
        }
    }

    function hapus($id_customer)
    {
        $this->db->where('id_customer', $id_customer);
        $this->db->delete('customer');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Customer berhasil dihapus!</div>');
        redirect('administrator/customer');
    }
}
