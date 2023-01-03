<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Kotak Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pagination'] = $this->pagination()['pagination'];
        $data['data'] = $this->pagination()['data'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pesan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesan'] = $this->db->get_where('pesan', ['id_pesan' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function pagination()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('administrator/pesan/index'); //site url
        $config['total_rows'] = $this->db->count_all('pesan'); //total row
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
        $data['data'] = $this->db->get('pesan', $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        return [
            'data' => $data['data'],
            'page' => $data['page'],
            'pagination' => $data['pagination'],
        ];
    }
}
