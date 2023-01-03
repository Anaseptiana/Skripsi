<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Daftar Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mobil'] = $this->db->get('mobil')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mobil/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required');
        // $this->form_validation->set_rules('deskripsi_mobil', 'Deskripsi Mobil', 'required');
        // $this->form_validation->set_rules('model', 'Model', 'required');
        // $this->form_validation->set_rules('harga', 'Harga', 'required');
        // $this->form_validation->set_rules('background', 'Background', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mobil/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('mobil', ['menu' => $this->input->post('menu')]);
            $this->post_mobil();
        }
    }

    public function post_mobil()
    {
        $config['upload_path'] = './assets/img/mobil/background';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/mobil/background/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/mobil/background/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $this->_create_thumbs($img['file_name']);

                $background = $img['file_name'];
                $nama_mobil = strip_tags(htmlspecialchars($this->input->post('nama_mobil', TRUE), ENT_QUOTES));
                $deskripsi = $this->input->post('contents');
                $harga_dalam_kota = strip_tags(htmlspecialchars($this->input->post('harga_dalam_kota', TRUE), ENT_QUOTES));
                $harga_luar_kota = strip_tags(htmlspecialchars($this->input->post('harga_luar_kota', TRUE), ENT_QUOTES));

                $preslug  = strip_tags(htmlspecialchars($this->input->post('nama_mobil', TRUE), ENT_QUOTES));
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
                $trim     = trim($string);
                $praslug  = strtolower(str_replace(" ", "-", $trim));
                $query = $this->db->get_where('mobil', array('slug' => $praslug));
                if ($query->num_rows() > 0) {
                    $uniqe_string = rand();
                    $slug = $praslug . '-' . $uniqe_string;
                } else {
                    $slug = $praslug;
                }

                $data = [
                    "nama_mobil" => $nama_mobil,
                    "slug" => $slug,
                    "deskripsi_mobil" => $deskripsi,
                    "harga_dalam_kota" => $harga_dalam_kota,
                    "harga_luar_kota" => $harga_luar_kota,
                    "background" => $background,
                ];

                $this->db->insert('mobil', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mobil berhasil ditambahkan!</div>');
                redirect('administrator/mobil');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mobil gagal ditambahkan!</div>');
                redirect('administrator/mobil');
            }
        } else {
            redirect('administrator/mobil');
        }
    }

    public function edit($id_mobil)
    {
        $data['title'] = 'Edit Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mobil'] = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row_array();
        // $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required');
        // $this->form_validation->set_rules('deskripsi_mobil', 'Deskripsi Mobil', 'required');
        // $this->form_validation->set_rules('model', 'Model', 'required');
        // $this->form_validation->set_rules('harga', 'Harga', 'required');
        // $this->form_validation->set_rules('background', 'Background', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mobil/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->db->insert('mobil', ['menu' => $this->input->post('menu')]);
            $this->update_mobil($id_mobil);
        }
    }

    public function update_mobil($id_mobil)
    {
        $config['upload_path'] = './assets/img/mobil/background';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        $background = $this->input->post('old_background', TRUE);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                $background = $img['file_name'];
                unlink("./assets/img/mobil/background/" . $this->input->post('old_background', TRUE));
            }
        }

        $nama_mobil = strip_tags(htmlspecialchars($this->input->post('nama_mobil', TRUE), ENT_QUOTES));
        $deskripsi_mobil = $this->input->post('deskripsi_mobil');
        $harga_dalam_kota = strip_tags(htmlspecialchars($this->input->post('harga_dalam_kota', TRUE), ENT_QUOTES));
        $harga_luar_kota = strip_tags(htmlspecialchars($this->input->post('harga_luar_kota', TRUE), ENT_QUOTES));

        $preslug  = strip_tags(htmlspecialchars($this->input->post('nama_mobil', TRUE), ENT_QUOTES));
        $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
        $trim     = trim($string);
        $praslug  = strtolower(str_replace(" ", "-", $trim));
        $query = $this->db->get_where('mobil', array('slug' => $praslug));
        if ($query->num_rows() > 0) {
            $uniqe_string = rand();
            $slug = $praslug . '-' . $uniqe_string;
        } else {
            $slug = $praslug;
        }


        $data = [
            "nama_mobil" => $nama_mobil,
            "slug" => $slug,
            "deskripsi_mobil" => $deskripsi_mobil,
            "harga_dalam_kota" => $harga_dalam_kota,
            "harga_luar_kota" => $harga_luar_kota,
            "background" => $background,
        ];

        $this->db->update('mobil', $data, ['id_mobil' => $id_mobil]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mobil berhasil diubah!</div>');
        redirect('administrator/mobil');
    }

    function hapus($id)
    {
        $this->db->where('id_mobil', $id);
        $this->db->delete('mobil');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mobil berhasil dihapus!</div>');
        redirect('administrator/mobil');
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

    //upload image summernote
    function upload_image()
    {
        if (isset($_FILES["file"]["name"])) {
            $config['upload_path'] = './assets/img/mobil/deskripsi';
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

    function list_gambar($id_mobil)
    {
        $mobil = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row_array();
        $data['title'] = 'Daftar List Mobil '.$mobil['nama_mobil'];
        $data['mobil'] = $mobil;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gambar'] = $this->db
            ->select('mobil.nama_mobil, gambar_mobil.*')
            ->from('gambar_mobil')
            ->join('mobil', 'gambar_mobil.id_mobil = mobil.id_mobil')
            ->where('gambar_mobil.id_mobil', $id_mobil)
            ->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mobil/list_gambar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_gambar($id_mobil)
    {
        $data['title'] = 'Tambah Gambar Mobil';
        $data['mobil'] = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mobils'] = $this->db->select('id_mobil, nama_mobil')->get('mobil')->result_array();
        $data['gambar_default'] = "";
        if ($id_mobil)
            $data['gambar_default'] = $this->db->get_where('gambar_mobil', ['is_default' => 1, 'id_mobil' => $id_mobil])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mobil/tambah_gambar', $data);
        $this->load->view('templates/footer');
    }

    public function post_gambar_mobil($id_mobil)
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
                $is_default = $this->input->post('is_default', true);
                if ($is_default){
                    $this->db->update('gambar_mobil', ['is_default' => 0], ['id_mobil' => $id_mobil]);
                }else{
                    $is_default = 0;
                } 


                $data = [
                    "id_mobil" => $id_mobil,
                    "gambar" => $background,
                    "is_default" => $is_default
                ];

                $this->db->insert('gambar_mobil', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar mobil berhasil ditambahkan</div>');
                redirect('administrator/mobil/list-gambar/'.$id_mobil);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar mobil gagal ditambahkan</div>');
                redirect('administrator/mobil/list-gambar/'.$id_mobil);
            }
        } else {
            redirect('administrator/mobil/list-gambar/'.$id_mobil);
        }
    }

    public function hapus_gambar($id)
    {
        $gambar = $this->db->get_where('gambar_mobil', ['id_gambar_mobil' => $id])->row_array();
        if ($gambar['is_default'] == 1) {
            $update = $this->db->select('id_gambar_mobil')->get('gambar_mobil')->row_array();
            $this->db->update('gambar_mobil', ['is_default' => 1], ['id_gambar_mobil' => $update['id_gambar_mobil']]);
        }

        unlink("./assets/img/mobil/gambar/" . $gambar['gambar']);
        $this->db->delete('gambar_mobil', ['id_gambar_mobil' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar mobil berhasil dihapus</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
