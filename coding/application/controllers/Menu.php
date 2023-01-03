<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['pagination'] = $this->pagination()['pagination'];
        $data['data'] = $this->pagination()['data'];

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('administrator/menu');
        }
    }

    public function edit_menu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer.php');
        } else {
            $data = [
                'menu' => $this->input->post('menu'),
            ];

            $this->db->update('user_menu', $data, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu updated</div>');
            redirect('administrator/menu');
        }
    }

    public function hapus_menu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Menu deleted</div>');
        redirect('administrator/menu');
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        // $data['subMenu'] = $this->menu->getSubMenu();
        $data['pagination'] = $this->pagination_submenu()['pagination'];
        $data['subMenu'] = $this->pagination_submenu()['data'];
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('administrator/menu/submenu');
        }
    }

    public function edit_submenu($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['submenu'] = $this->menu->getSubMenuById($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer.php');
        } else {
            $this->menu->update($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu berhasil diubah</div>');
            redirect('administrator/menu/submenu');
        }
    }

    public function hapus_submenu($id)
    {
        $this->load->model('Menu_model', 'menu');
        $this->menu->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu berhasil dihapus</div>');
        redirect('administrator/menu/submenu');
    }

    public function pagination()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('administrator/menu/index'); //site url
        $config['total_rows'] = $this->db->count_all('user_menu'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['data'] = $this->db->get('user_menu', $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        return [
            'data' => $data['data'],
            'page' => $data['page'],
            'pagination' => $data['pagination'],
        ];
    }

    public function pagination_submenu()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('administrator/menu/submenu/index'); //site url
        $config['total_rows'] = $this->db->count_all('user_sub_menu'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 5;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->model('Menu_model', 'menu');

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['data'] = $this->menu->getSubMenu($config["per_page"], $data['page']);
        // $data['data'] = $this->db->get('user_menu', $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        return [
            'data' => $data['data'],
            'page' => $data['page'],
            'pagination' => $data['pagination'],
        ];
    }
}
