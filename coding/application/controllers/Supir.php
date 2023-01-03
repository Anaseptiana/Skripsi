<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Daftar Supir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supir'] = $this->db->get('supir')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supir/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Supir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_supir', 'Nama Supir', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supir/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('mobil', ['menu' => $this->input->post('menu')]);
            $this->insert_supir();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supir berhasil ditambahkan!</div>');
            redirect('administrator/supir');
        }
    }

    public function insert_supir()
    {
        // $config['upload_path'] = './assets/img/supir';
        // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        // $config['encrypt_name'] = TRUE;

        // $this->upload->initialize($config);

        // $foto = "default.png";
        // if (!empty($_FILES['filefoto']['name'])) {
        //     if ($this->upload->do_upload('filefoto')) {
        //         $img = $this->upload->data();
        //         //Compress Image
        //         $config['image_library'] = 'gd2';
        //         $config['source_image'] = './assets/img/supir/' . $img['file_name'];
        //         $config['create_thumb'] = FALSE;
        //         $config['maintain_ratio'] = FALSE;
        //         $config['quality'] = '100%';
        //         $config['width'] = 1420;
        //         $config['height'] = 900;
        //         $config['new_image'] = './assets/img/supir/' . $img['file_name'];
        //         $this->load->library('image_lib', $config);
        //         $this->image_lib->resize();

        //         $this->_create_thumbs($img['file_name']);

        //         $foto = $img['file_name'];
        //     } else {
        //         echo $this->session->set_flashdata('message', 'warning');
        //         redirect('administrator/supir');
        //     }
        // }

        $nama_supir = input_post($this->input->post('nama_supir', TRUE));
        $telp = input_post($this->input->post('telp', TRUE));
        $alamat = input_post($this->input->post('alamat', TRUE));

        $data = [
            "nama_supir" => $nama_supir,
            "telp" => $telp,
            "alamat" => $alamat,
        ];

        $this->db->insert('supir', $data);
    }

    public function edit($id_supir)
    {
        $data['title'] = 'Edit Supir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supir'] = $this->db->get_where('supir', ['id_supir' => $id_supir])->row_array();

        $this->form_validation->set_rules('nama_supir', 'Nama Supir', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supir/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('mobil', ['menu' => $this->input->post('menu')]);
            $this->update_supir($id_supir);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supir berhasil diubah!</div>');
            redirect('administrator/supir');
        }
    }

    public function update_supir($id_supir)
    {
        $nama_supir = input_post($this->input->post('nama_supir', TRUE));
        $telp = input_post($this->input->post('telp', TRUE));
        $alamat = input_post($this->input->post('alamat', TRUE));

        $data = [
            "nama_supir" => $nama_supir,
            "telp" => $telp,
            "alamat" => $alamat,
        ];

        $this->db->update('supir', $data, ['id_supir' => $id_supir]);
    }

    public function hapus($id_supir)
    {
        $this->db->where('id_supir', $id_supir);
        $this->db->delete('supir');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supir berhasil dihapus!</div>');
        redirect('administrator/supir');
    }

    function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/img/supir/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 370,
                'height'        => 237,
                'new_image'     => './assets/img/supir/thumb/' . $file_name
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

    //upload image summernote
    function upload_image()
    {
        if (isset($_FILES["file"]["name"])) {
            $config['upload_path'] = './assets/img/supir';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/mobil/deskripsi/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/img/mobil/deskripsi/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'assets/img/mobil/deskripsi/' . $data['file_name'];
            }
        }
    }
}
