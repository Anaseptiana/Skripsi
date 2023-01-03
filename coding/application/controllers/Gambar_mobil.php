<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Daftar Gambar Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gambar'] = $this->db
            ->select('mobil.nama_mobil, gambar_mobil.*')
            ->from('gambar_mobil')
            ->join('mobil', 'gambar_mobil.id_mobil = mobil.id_mobil')
            ->get()->result_array();
        // $data['pagination'] = $this->pagination()['pagination'];
        // $data['gambar'] = $this->pagination()['data'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gambar_mobil/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($id_mobil = '')
    {
        $data['title'] = 'Tambah Gambar Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mobils'] = $this->db->select('id_mobil, nama_mobil')->get('mobil')->result_array();
        $data['gambar_default'] = "";
        if ($id_mobil)
            $data['gambar_default'] = $this->db->get_where('gambar_mobil', ['is_default' => 1, 'id_mobil' => $id_mobil])->num_rows();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gambar_mobil/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->post_gambar_mobil();
        }
    }

    public function hapus($id)
    {
        $gambar = $this->db->get_where('gambar_mobil', ['id_gambar_mobil' => $id])->row_array();
        if ($gambar['is_default'] == 1) {
            $update = $this->db->select('id_gambar_mobil')->get('gambar_mobil')->row_array();
            $this->db->update('gambar_mobil', ['is_default' => 1], ['id_gambar_mobil' => $update['id_gambar_mobil']]);
        }

        unlink("./assets/img/mobil/gambar/" . $gambar['gambar']);
        $this->db->delete('gambar_mobil', ['id_gambar_mobil' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar mobil berhasil dihapus</div>');
        redirect('administrator/mobil/gambar');
    }

    public function pagination()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('administrator/mobil/gambar/index'); //site url
        $config['total_rows'] = $this->db->count_all('gambar_mobil'); //total row
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

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['data'] = $this->db->select('mobil.nama_mobil, gambar_mobil.*')
            ->join('mobil', 'gambar_mobil.id_mobil = mobil.id_mobil')
            ->get('gambar_mobil', $config["per_page"], $data['page'])->result_array();

        $data['pagination'] = $this->pagination->create_links();

        return [
            'data' => $data['data'],
            'page' => $data['page'],
            'pagination' => $data['pagination'],
        ];
    }

    public function post_gambar_mobil()
    {
        $config['upload_path'] = './assets/img/mobil/gambar';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/mobil/gambar/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 635;
                $config['height'] = 422;
                $config['new_image'] = './assets/img/mobil/gambar/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $background = $img['file_name'];
                $id_mobil = $this->input->post('id_mobil', TRUE);
                $is_default = $this->input->post('is_default', true);
                if (!$is_default) $is_default = 0;

                $data = [
                    "id_mobil" => $id_mobil,
                    "gambar" => $background,
                    "is_default" => $is_default
                ];

                $this->db->insert('gambar_mobil', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar mobil berhasil ditambahkan</div>');
                redirect('administrator/mobil/gambar');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar mobil gagal ditambahkan</div>');
                redirect('administrator/mobil/gambar');
            }
        } else {
            redirect('administrator/mobil/gambar');
        }
    }

    function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/img/mobil/gambar/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 635,
                'height'        => 422,
                'new_image'     => './assets/img/mobil/gambar/thumb/' . $file_name
            )
        );

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item) {
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                return false;
            }
            $this->image_lib->clear();
        }
    }
}
