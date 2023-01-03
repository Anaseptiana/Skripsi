<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
    }

    public function index()
    {
        $data['title'] = 'Daftar Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['blogs'] = $this->db->select('blog.*, user.name')
            ->join('user', 'blog.id_user = user.id')
            ->get('blog')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('blog/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('blog/tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('blog/js');
        } else {
            $this->post_blog();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Blog berhasil ditambahkan!</div>');
            // redirect('administrator/mobil');
        }
    }

    public function post_blog()
    {
        $config['upload_path'] = './assets/img/blog';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/blog/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/blog/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $background = $img['file_name'];
                $judul = strip_tags(htmlspecialchars($this->input->post('judul', TRUE), ENT_QUOTES));
                $konten = $this->input->post('konten');
                $id_user = strip_tags(htmlspecialchars($this->input->post('id_user', TRUE), ENT_QUOTES));

                $preslug  = strip_tags(htmlspecialchars($this->input->post('judul', TRUE), ENT_QUOTES));
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
                $trim     = trim($string);
                $praslug  = strtolower(str_replace(" ", "-", $trim));
                $query = $this->db->get_where('blog', array('slug' => $praslug));
                if ($query->num_rows() > 0) {
                    $uniqe_string = rand();
                    $slug = $praslug . '-' . $uniqe_string;
                } else {
                    $slug = $praslug;
                }

                $data = [
                    "judul" => $judul,
                    "slug" => $slug,
                    "konten" => $konten,
                    "id_user" => $id_user,
                    "background" => $background,
                ];

                $this->db->insert('blog', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Blog berhasil ditambahkan!</div>');
                redirect('administrator/blog');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Blog gagal ditambahkan!</div>');
                redirect('administrator/blog');
            }
        } else {
            redirect('administrator/blog');
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

    //upload image summernote
    function upload_image()
    {
        if (isset($_FILES["file"]["name"])) {
            $config['upload_path'] = './assets/img/blog/konten/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/blog/konten/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = './assets/img/blog/konten/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'assets/img/blog/konten/' . $data['file_name'];
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['blog'] = $this->db->get_where('blog', ['id_blog' => $id])->row_array();
        $data['user_blog'] = $this->db->get_where('user', ['id' => $data['blog']['id_user']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('blog/edit', $data);
        $this->load->view('templates/footer');
        $this->load->view('blog/js');
    }

    public function update_blog($id)
    {
        $config['upload_path'] = './assets/img/blog';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if (!empty($_FILES['filefoto']['name'])) {
            $data_blog = $this->db->get_where('blog', ['id_blog' => $id])->row_array();
            unlink('./assets/img/blog/' . $data_blog['background']);

            if ($this->upload->do_upload('filefoto')) {
                $img = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/blog/' . $img['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1420;
                $config['height'] = 900;
                $config['new_image'] = './assets/img/blog/' . $img['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                // $this->_create_thumbs($img['file_name']);

                $background = $img['file_name'];
                $judul = strip_tags(htmlspecialchars($this->input->post('judul', TRUE), ENT_QUOTES));
                $konten = $this->input->post('konten');

                $preslug  = strip_tags(htmlspecialchars($this->input->post('judul', TRUE), ENT_QUOTES));
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
                $trim     = trim($string);
                $praslug  = strtolower(str_replace(" ", "-", $trim));
                $query = $this->db->get_where('blog', array('slug' => $praslug));
                if ($query->num_rows() > 0) {
                    $uniqe_string = rand();
                    $slug = $praslug . '-' . $uniqe_string;
                } else {
                    $slug = $praslug;
                }

                $data = [
                    "judul" => $judul,
                    "slug" => $slug,
                    "konten" => $konten,
                    "background" => $background,
                    "updated_at" => date('Y-m-d H:i:s')
                ];

                $this->db->update('blog', $data, ["id_blog" => $id]);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Blog berhasil diubah!</div>');
                redirect('administrator/blog');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Blog gagal diubah!</div>');
                redirect('administrator/blog');
            }
        } else {
            $judul = strip_tags(htmlspecialchars($this->input->post('judul', TRUE), ENT_QUOTES));
            $konten = $this->input->post('konten');

            $preslug  = strip_tags(htmlspecialchars($this->input->post('judul', TRUE), ENT_QUOTES));
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
            $trim     = trim($string);
            $praslug  = strtolower(str_replace(" ", "-", $trim));
            $query = $this->db->get_where('blog', array('slug' => $praslug));
            if ($query->num_rows() > 0) {
                $uniqe_string = rand();
                $slug = $praslug . '-' . $uniqe_string;
            } else {
                $slug = $praslug;
            }

            $data = [
                "judul" => $judul,
                "slug" => $slug,
                "konten" => $konten,
                "updated_at" => date('Y-m-d H:i:s')
            ];

            $this->db->update('blog', $data, ["id_blog" => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Blog berhasil diubah!</div>');
            redirect('administrator/blog');
        }
    }

    function hapus($id)
    {
        $this->db->where('id_blog', $id);
        $this->db->delete('blog');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Blog berhasil dihapus!</div>');
        redirect('administrator/blog');
    }
}
