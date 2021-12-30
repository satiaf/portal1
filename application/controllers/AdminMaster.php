<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMaster extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$data = $this->M_auth->login($username, $password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('AdminMaster');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "Loged in"
				];
				$this->session->set_userdata($session);
				redirect('Home');
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}

	public function sign_up() {
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('telephone', 'No Tlpn/ Hp', 'trim|required|is_numeric|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('media', 'Nama Media', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$data=array( 
			'nama' => $this->input->post('nama'),
			'telephone' => $this->input->post('telephone'),
			'alamat' => $this->input->post('alamat'),
			'media' => $this->input->post('media'),
			'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
			'jenis_user' => '2',
          );

		if ($this->form_validation->run() == TRUE) {

			$result = $this->M_auth->insert_data('ta_user', $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data User Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data User Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */