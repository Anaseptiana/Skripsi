<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Daftar Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['testimoni'] = $this->db->get('testimoni')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('testimoni/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('testimoni/tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('testimoni/js');
        } else {
            $this->post_testimoni();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Blog berhasil ditambahkan!</div>');
            // redirect('administrator/mobil');
        }
    }

    public function post_testimoni()
    {
        $config['upload_path'] = './assets/img/testimoni';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/testimoni/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/testimoni/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $foto = $img['file_name'];
                $nama = strip_tags(htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES));
                $pesan = $this->input->post('pesan');
                $status = $this->input->post('status');

                $data = [
                    "nama" => $nama,
                    "pesan" => $pesan,
                    "status" => $status,
                    "foto" => $foto,
                ];

                $this->db->insert('testimoni', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Testimoni berhasil ditambahkan!</div>');
                redirect('administrator/testimoni');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Testimoni gagal ditambahkan!</div>');
                redirect('administrator/testimoni');
            }
        } else {
            redirect('administrator/testimoni');
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
        $data['title'] = 'Edit Testimoni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['testimoni'] = $this->db->get_where('testimoni', ['id_testimoni' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('testimoni/edit', $data);
        $this->load->view('templates/footer');
        $this->load->view('testimoni/js');
    }

    public function update_testimoni($id)
    {
        $config['upload_path'] = './assets/img/testimoni';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            $data_testimoni = $this->db->get_where('testimoni', ['id_testimoni' => $id])->row_array();
            unlink('./assets/img/testimoni/' . $data_testimoni['foto']);

            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/testimoni/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/testimoni/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $foto = $img['file_name'];
                $nama = strip_tags(htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES));
                $pesan = $this->input->post('pesan');
                $status = $this->input->post('status');

                $data = [
                    "nama" => $nama,
                    "pesan" => $pesan,
                    "foto" => $foto,
                    'status' => $status,
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $this->db->update('testimoni', $data, ["id_testimoni" => $id]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Testimoni berhasil diubah!</div>');
                redirect('administrator/testimoni');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Testimoni gagal diubah!</div>');
                redirect('administrator/testimoni');
            }
        } else {
            $foto = $img['file_name'];
            $nama = strip_tags(htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES));
            $pesan = $this->input->post('pesan');
            $status = $this->input->post('status');

            $data = [
                    "nama" => $nama,
                    "pesan" => $pesan,
                    "status" => $status,
                    "updated_at" => date('Y-m-d H:i:s')
            ];

            $this->db->update('testimoni', $data, ["id_testimoni" => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Testimoni berhasil diubah!</div>');
            redirect('administrator/testimoni');
        }
    }

    function hapus($id)
    {
        $this->db->where('id_testimoni', $id);
        $this->db->delete('testimoni');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Testimoni berhasil dihapus!</div>');
        redirect('administrator/testimoni');
    }
}
