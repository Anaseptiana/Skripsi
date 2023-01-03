<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index1()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['title'] = 'Daftar User Admin';
        $data['users'] = $this->db->select('name, email, id, is_active')
            ->from('user')
            ->get()
            ->result_array();
        $data['roles'] = $this->db->get('user_role')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/user/index', $data);
            $this->load->view('templates/footer.php');
        } else {
            $user = [
                'name' => $this->input->post('nama', true),
                'password' => password_hash($this->input->post('email', true), PASSWORD_DEFAULT),
                'email' => $this->input->post('email', true),
                'image' => 'default.jpg',
                'is_active' => 1,
                'date_created' => time(),
            ];

            $this->db->insert('user', $user);
            $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil ditambahkan</div>');
            redirect('administrator/admin');
        }
    }

    public function edit_user($id)
    {
        $data['title'] = 'Edit User Admin';
        $data['data_user'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $data['roles'] = $this->db->get('user_role')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->input->post('email', true) == $data['data_user']['email']) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templates/footer.php');
        } else {
            $user = [
                'name' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'is_active' => $this->input->post('is_active', true),
            ];

            $this->db->update('user', $user, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil diubah</div>');
            redirect('administrator/admin');
        }
    }

    public function hapus_user($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success">User admin berhasil dihapus</div>');
        redirect('administrator/admin');
    }
}
