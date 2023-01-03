<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_customer();
        $this->load->library('upload');
    }

    public function index()
    {
        $data['setting'] = $this->db->get('setting')->row_array();
        $data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
        $this->load->view('front/customer/header', $data);
        $this->load->view('front/customer/index', $data);
        $this->load->view('front/customer/footer');
    }

    public function edit()
    {
        $data['setting'] = $this->db->get('setting')->row_array();
        $data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();

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
            $this->load->view('front/customer/header', $data);
            $this->load->view('front/customer/edit', $data);
            $this->load->view('front/customer/footer');
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

            $this->db->update('customer', $data, ['id_customer' => $this->input->post('id_customer')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diubah!</div>');
            redirect('customer');
        }
    }

    public function pesanan()
    {
        $data['setting'] = $this->db->get('setting')->row_array();
        $data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
        $data['pesanan'] = $this->db->where('id_customer', $data['customer']['id_customer'])
                                    ->order_by('id_pesanan', 'DESC')
                                    ->get('pesanan')->result_array();
        $this->load->view('front/customer/header', $data);
        $this->load->view('front/customer/pesanan', $data);
        $this->load->view('front/customer/footer');
    }

    public function detail_pesanan($id_pesanan)
    {
        $data['setting'] = $this->db->get('setting')->row_array();
        $data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
        $data['detail_pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        $data['testimoni'] = $this->db->get_where('testimoni', ['id_pesanan' => $id_pesanan])->row_array();

        $this->load->view('front/customer/header', $data);
        $this->load->view('front/customer/detail_pesanan', $data);
        $this->load->view('front/customer/footer');
    }

    public function post_pesanan()
    {
        $lokasi_jemput = null;
        if(!is_null($this->input->post('lokasi_jemput', TRUE)) && $this->input->post('lokasi_jemput', TRUE) != ''){
            $lokasi_jemput = $this->input->post('lokasi_jemput', TRUE);
        }
        $data = [
            'no_pesanan' => $this->generateNoPesanan(),
            'id_mobil' => $this->input->post('id_mobil', TRUE),
            'id_customer' => $this->input->post('id_customer', TRUE),
            'id_supir' => $this->input->post('id_supir', TRUE),
            'supir' => $this->input->post('supir', TRUE),
            'harga_mobil' => $this->input->post('harga_mobil', TRUE),
            'nama_mobil' => $this->input->post('nama_mobil', TRUE),
            'harga_supir' => $this->input->post('harga_supir', TRUE),
            'tanggal_pesan' => date('Y-m-d'),
            'tujuan' => $this->input->post('tujuan', TRUE),
            'tanggal_mulai' => $this->input->post('tanggal_mulai', TRUE),
            'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
            'total_harga' => $this->input->post('total', TRUE),
            'jumlah_hari' => $this->input->post('jumlah_hari', TRUE),
            'lokasi_jemput' => $lokasi_jemput,
            'status' => 1
        ];

        $this->db->insert('pesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil dibuat, Silahkan konfirmasi pesanan</div>');
        redirect('customer/pesanan');
    }

    public function generateNoPesanan()
    {
        $num_rows = $this->db->get('pesanan')->num_rows();

        return 'PSNN'.date('Ymd').($num_rows+1);
    }

    public function post_konfirmasi_pesanan()
    {
        $config['upload_path'] = './assets/img/bukti_transfer';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        if (!empty($_FILES['bukti_transfer']['name'])) {
            if ($this->upload->do_upload('bukti_transfer')) {
                $img = $this->upload->data();
                $bukti_transfer = $img['file_name'];
                
                $data = [
                    'id_pesanan' => $this->input->post('id_pesanan', TRUE),
                    'no_rekening' => $this->input->post('no_rekening', TRUE),
                    'nama_akun' => $this->input->post('nama_akun', TRUE),
                    'tanggal_transfer' => $this->input->post('tanggal_transfer', TRUE),
                    'bukti_transfer' => $bukti_transfer
                ];

                $this->db->insert('konfirmasi_pesanan', $data);

                $this->db->update('pesanan', ['status' => 2], ["id_pesanan" => $this->input->post('id_pesanan', TRUE)]);           

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil dikonfirmasi, sedang divalidasi oleh admin</div>');
                redirect('customer/pesanan');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('customer');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('/');
    }

    public function post_testimoni()
    {
        $pesanan = $this->db->select('customer.nama_customer')
                            ->join('customer', 'pesanan.id_customer = customer.id_customer')
                            ->get_where('pesanan', ['id_pesanan' => $this->input->post('id_pesanan')])->row_array();
        $data = [
            'id_pesanan' => $this->input->post('id_pesanan', TRUE),
            'nama' => $pesanan['nama_customer'],
            'pesan' => $this->input->post('pesan', TRUE),
            'foto' => 'default.jpg'
        ];

        $this->db->insert('testimoni', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Testimoni berhasil dibuat!</div>');
        redirect('customer/pesanan/detail/'.$this->input->post('id_pesanan', TRUE));
    }
}
