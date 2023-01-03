<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Daftar Banner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['banner'] = $this->db->get('banner')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('banner/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Banner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('banner/tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('banner/js');
        } else {
            $this->post_banner();
            // redirect('administrator/mobil');
        }
    }

    public function post_banner()
    {
        $config['upload_path'] = './assets/img/banner';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/banner/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/banner/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $judul = $this->input->post('judul');
                $sub_judul = $this->input->post('sub_judul');
                $nama_link = $this->input->post('nama_link');
                $link = $this->input->post('link');
                $gambar = $img['file_name'];

                $data = [
                    "judul" => $judul,
                    "sub_judul" => $sub_judul,
                    "nama_link" => $nama_link,
                    "link" => $link,
                    "gambar" => $gambar,
                ];

                $this->db->insert('banner', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Banner berhasil ditambahkan!</div>');
                redirect('administrator/banner');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Banner gagal ditambahkan!</div>');
                redirect('administrator/banner');
            }
        } else {
            redirect('administrator/banner');
        }
    }

    function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            array(
                'image_library' => 'GD2',
                'source_image'  => './assets/img/mobil/background/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 370,
                'height'        => 237,
                'new_image'     => './assets/img/mobil/background/thumb/' . $file_name
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

    public function edit($id)
    {
        $data['title'] = 'Edit Banner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['banner'] = $this->db->get_where('banner', ['id_banner' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('banner/edit', $data);
        $this->load->view('templates/footer');
        $this->load->view('banner/js');
    }

    public function update_banner($id)
    {
        $config['upload_path'] = './assets/img/banner';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            $data_banner = $this->db->get_where('banner', ['id_banner' => $id])->row_array();
            unlink('./assets/img/banner/' . $data_banner['foto']);

            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/banner/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/banner/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $judul = $this->input->post('judul');
                $sub_judul = $this->input->post('sub_judul');
                $nama_link = $this->input->post('nama_link');
                $link = $this->input->post('link');
                $gambar = $img['file_name'];

                $data = [
                    "judul" => $judul,
                    "sub_judul" => $sub_judul,
                    "nama_link" => $nama_link,
                    "link" => $link,
                    "gambar" => $gambar,
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $this->db->update('banner', $data, ["id_banner" => $id]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Banner berhasil diubah!</div>');
                redirect('administrator/banner');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Banner gagal diubah!</div>');
                redirect('administrator/banner');
            }
        } else {
            
            $judul = $this->input->post('judul');
            $sub_judul = $this->input->post('sub_judul');
            $nama_link = $this->input->post('nama_link');
            $link = $this->input->post('link');

            $data = [
                "judul" => $judul,
                "sub_judul" => $sub_judul,
                "nama_link" => $nama_link,
                "link" => $link,
                "updated_at" => date('Y-m-d H:i:s')
            ];

            $this->db->update('banner', $data, ["id_banner" => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Banner berhasil diubah!</div>');
            redirect('administrator/banner');
        }
    }

    function hapus($id)
    {
        $this->db->where('id_banner', $id);
        $this->db->delete('banner');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Banner berhasil dihapus!</div>');
        redirect('administrator/banner');
    }
}
