<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'home';
		$data['mobils'] = $this->db->get('mobil')->result_array();
		$data['blogs'] = $this->db->select('blog.*, user.name')
			->join('user', 'blog.id_user = user.id')
			->get('blog')->result_array();
		$data['banner'] = $this->db->get('banner')->result_array();
		$data['testimoni'] = $this->db->get_where('testimoni', ['status' => 1])->result_array();

		$data['customer'] = null;
		if($this->session->userdata('customer')){
			$data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
		}


		$this->load->view('front/templates/header', $data);
		$this->load->view('front/index', $data);
		$this->load->view('front/templates/footer');
	}

	public function cars()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['tipes'] = $this->db->get('tipe_mobil')->result_array();
		$data['menu'] = 'cars';
		$data['customer'] = null;
		if($this->session->userdata('customer')){
			$data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
		}

		if ($this->input->get('tipe', true) != "" && $this->input->get('max', true) != "" && $this->input->get('min', true) != "") {
			$this->db->where('tipe_mobil', $this->input->get('tipe', true));
			$this->db->where('harga >=', $this->input->get('min', true));
			$this->db->where('harga <=', $this->input->get('max', true));
		} elseif ($this->input->get('tipe', true != "") && $this->input->get('max', true == "") && $this->input->get('min', true) == "") {
			$this->db->where('tipe_mobil', $this->input->get('tipe', true));
		} elseif ($this->input->get('tipe', true) == "" && $this->input->get('max', true) != "" && $this->input->get('min', true) != "") {
			$this->db->where('harga >=', $this->input->get('min', true));
			$this->db->where('harga <=', $this->input->get('max', true));
		}
		$data['mobils'] = $this->db->get('mobil')->result_array();
		// $data['mobils'] = $this->db->get('mobil')->result_array();

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/cars', $data);
		$this->load->view('front/templates/footer');
	}

	public function about()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'about';

		$data['customer'] = null;
		if($this->session->userdata('customer')){
			$data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
		}

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/about');
		$this->load->view('front/templates/footer');
	}

	public function blog()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'blog';
		$data['blog'] = $this->db->select('blog.*, user.name')
			->join('user', 'blog.id_user = user.id')
			->order_by('id_blog', 'DESC')
			->get('blog')->result_array();

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/blog');
		$this->load->view('front/templates/footer');
	}

	public function team()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'about';

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/team');
		$this->load->view('front/templates/footer');
	}

	public function testimonials()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'about';
		$data['testimoni'] = $this->db->get_where('testimoni', ['status' => 1])->result_array();

		$data['customer'] = null;
		if($this->session->userdata('customer')){
			$data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
		}

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/testimonials', $data);
		$this->load->view('front/templates/footer');
	}

	public function faq()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'about';

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/faq');
		$this->load->view('front/templates/footer');
	}

	public function terms()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'about';

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/terms');
		$this->load->view('front/templates/footer');
	}

	public function contact()
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'contact';

		$data['customer'] = null;
		if($this->session->userdata('customer')){
			$data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
		}

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/contact');
		$this->load->view('front/templates/footer');
	}

	public function detail_mobil($slug)
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'cars';
		$data['mobil'] = $this->db->get_where('mobil', ['slug' => $slug])->row_array();
		$data['gambar_mobil'] = $this->db->get_where('gambar_mobil', ['id_mobil' => $data['mobil']['id_mobil'], 'is_default' => 0])->result_array();
		$data['gambar_default'] = $this->db->get_where('gambar_mobil', ['id_mobil' => $data['mobil']['id_mobil'], 'is_default' => 1])->row_array();

		$data['customer'] = null;
		if($this->session->userdata('customer')){
			$data['customer'] = $this->db->get_where('customer', ['email' => $this->session->userdata('customer')])->row_array();
		}
		
		$this->load->view('front/templates/header', $data);
		$this->load->view('front/car-details.php', $data);
		$this->load->view('front/templates/footer');
	}

	public function detail_blog($slug)
	{
		$data['setting'] = $this->db->get('setting')->row_array();
		$data['menu'] = 'blog';
		$data['blog'] = $this->db->select('blog.*, user.name')
			->join('user', 'blog.id_user = user.id')
			->where('slug', $slug)
			->get('blog')->row_array();

		$this->load->view('front/templates/header', $data);
		$this->load->view('front/blog-details.php', $data);
		$this->load->view('front/templates/footer');
	}

	public function post_pesan()
	{
		$nama = strip_tags(htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES));
		$email = strip_tags(htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES));
		$subject = strip_tags(htmlspecialchars($this->input->post('subject', TRUE), ENT_QUOTES));
		$isi_pesan = strip_tags(htmlspecialchars($this->input->post('isi_pesan', TRUE), ENT_QUOTES));

		$data = [
			'nama' => $nama,
			'email' => $email,
			'subject' => $subject,
			'isi_pesan' => $isi_pesan
		];

		$this->db->insert('pesan', $data);
		$this->session->set_flashdata('pesan-sukses', 'alert("Pesan berhasil dikirim, terima kasih sudah menghubungi kami")');
		redirect('/');
	}

	public function login()
	{
		if ($this->session->userdata('customer')) {
            redirect('customer');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Customer';
            $this->load->view('front/templates/auth_header', $data);
            $this->load->view('front/login', $data);
            $this->load->view('front/templates/auth_footer');
        } else {
            // validasinya success
            // $this->_login();
            $email = $this->input->post('email');
	        $password = $this->input->post('password');

	        $customer = $this->db->get_where('customer', ['email' => $email])->row_array();

	        // jika customernya ada
	        if ($customer) {
                // cek password
                if (password_verify($password, $customer['password'])) {
                    $data = [
                        'customer' => $customer['email'],
                    ];
                    $this->session->set_userdata($data);
                    if(!is_null($this->input->post('redirect'))){
                        redirect($this->input->post('redirect'));
                    	return;
                    }
                    redirect('customer');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
	        } else {
	            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
	            redirect('login');
	        }
        }
	}

	public function register()
	{
		if ($this->session->userdata('customer')) {
            redirect('customer');
        }

        $this->form_validation->set_rules('nama_customer', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'No. HP', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Customer';
            $this->load->view('front/templates/auth_header', $data);
            $this->load->view('front/register', $data);
            $this->load->view('front/templates/auth_footer');
        } else {
            // validasinya success
            $data = [
                'nama_customer' => htmlspecialchars($this->input->post('nama_customer', true)),
                'email' => $this->input->post('email', true),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->db->insert('customer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Berhasil, Silahkan Login!</div>');
            redirect('login');
        }
	}
}
