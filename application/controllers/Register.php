<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_register');
	}

	public function index() {
		$data['userdata'] = $this->userdata;

		$id = $this->session->userdata('id');

		$data['dataRegister'] = $this->M_register->select_by_id('ta_register', $id);

		$data['page'] = "register";
		$data['subpage'] = "";
		$data['judul'] = "Data Register";
		$data['deskripsi'] = "Manage Data Register";

		$data['modal_tambah_register'] = show_my_modal('modals/modal_tambah_register', 'tambah-register', $data);

		$this->template->views('register/home', $data);
	}

	public function tambah() {
		$this->form_validation->set_rules('nama', 'Nama Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone Berita Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('media', 'Media Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('username', 'Username Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('password', 'Password Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('jenis_user', 'Jenis User Tidak Boleh Kosong', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_master->insert_data('ta_user', $data);
			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data User Berhasil ditambah'));
				redirect('Master/user');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data User Gagal ditambah'));
				redirect('Master/user');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Master/user');
		}
	}

	public function update_user() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataUser'] = $this->M_master->select_by_id($id);
		$data['dataJenis_user'] = $this->M_master->select_all('ta_jenis_user', "id ASC");

		echo show_my_modal('modals/modal_update_user', 'update-user', $data);
	}

	public function ubah_user() {
		$this->form_validation->set_rules('nama', 'Nama Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone Berita Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('media', 'Media Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('username', 'Username Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('password', 'Password Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('jenis_user', 'Jenis User Tidak Boleh Kosong', 'trim|required');

		$id = $_POST['id'];
		$data = $this->input->post();

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_master->update_data('ta_user', $data, $id);
			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data User Berhasil diubah'));
				redirect('Master/user');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data User Gagal diubah'));
				redirect('Master/user');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Master/user');
		}
	}

	public function delete_user() {
		$id = $_POST['id'];
		$result = $this->M_master->delete('ta_user' ,$id);

		if ($result > 0) {
			echo show_succ_msg('Data Berita Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Berita Gagal dihapus', '20px');
		}
	}

	//

	public function tipe_berita() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Tipe Berita";
		$data['judul'] = "Data Tipe Berita";

		$this->template->views('tipeberita/home', $data);
	}
	public function tampil_tipe_berita() {
		
		$data['datatipe_berita'] = $this->M_master->get_id('ta_tipe_berita', "id ASC");
		$this->load->view('tipeberita/list_data', $data);
	}

	public function jenis_user() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Jenis User";
		$data['judul'] = " Jenis User";

		$this->template->views('jenis_user/home', $data);
	}
	public function tampil_jenis_user() {
		
		$data['datajenis_user'] = $this->M_master->get_id('ta_jenis_user', "id ASC");
		$this->load->view('jenis_user/list_data', $data);
	}

	public function jenis_media() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Jenis Media";
		$data['judul'] = " Jenis Media";

		$this->template->views('jenis_media/home', $data);
	}
	public function tampil_jenis_media() {
		
		$data['datajenis_media'] = $this->M_master->get_id('ta_jenis_media', "id ASC");
		$this->load->view('jenis_media/list_data', $data);
	}

	public function cakupan_media() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Cakupan Media";
		$data['judul'] = " Cakupan Media";

		$this->template->views('cakupan_media/home', $data);
	}
	public function tampil_cakupan_media() {
		
		$data['datacakupan_media'] = $this->M_master->get_id('ta_cakupan_media', "id ASC");
		$this->load->view('cakupan_media/list_data', $data);
	}

	public function sebaran_oplah() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Sebaran Oplah ";
		$data['judul'] = " Sebaran Oplah";

		$this->template->views('sebaran_oplah/home', $data);
	}
	public function tampil_sebaran_oplah() {
		
		$data['datasebaran_oplah'] = $this->M_master->get_id('ta_sebaran_oplah', "id ASC");
		$this->load->view('sebaran_oplah/list_data', $data);
	}
	public function sebaran_oplah_kabupaten() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Sebaran Oplah Kabupaten";
		$data['judul'] = " Sebaran Oplah Kabupaten";

		$this->template->views('sebaran_oplah_kabupaten/home', $data);
	}
	public function tampil_sebaran_oplah_kabupaten() {
		
		$data['datasebaran_oplah_kabupaten'] = $this->M_master->get_id('ta_oplah_kabupaten', "id ASC");
		$this->load->view('sebaran_oplah_kabupaten/list_data', $data);
	}

	public function expired() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Expired Web";
		$data['judul'] = " Expired Web";

		$this->template->views('expired/home', $data);
	}
	public function tampil_expired() {
		
		$data['dataexpired'] = $this->M_master->get_id('ta_expired_web', "id ASC");
		$this->load->view('expired/list_data', $data);
	}
	public function status() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Status Kantor";
		$data['judul'] = " Status Kantor";

		$this->template->views('status/home', $data);
	}
	public function tampil_status() {
		
		$data['datastatus'] = $this->M_master->get_id('ta_st_kantor', "id ASC");
		$this->load->view('status/list_data', $data);
	}
	public function rangking() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Rangking Indonesia";
		$data['judul'] = " Ragnking Indonesia";

		$this->template->views('rangking/home', $data);
	}
	public function tampil_rangking() {
		
		$data['datarangking'] = $this->M_master->get_id('ta_rangking_indonesia', "id ASC");
		$this->load->view('rangking/list_data', $data);
	}
	public function rangking_global() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Rangking Global";
		$data['judul'] = " Rangking Global";

		$this->template->views('rangking_global/home', $data);
	}
	public function tampil_rangking_global() {
		
		$data['datarangking_global'] = $this->M_master->get_id('ta_rangking_global', "id ASC");
		$this->load->view('rangking_global/list_data', $data);
	}
	public function usia() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Usia Web";
		$data['judul'] = " Usia Web";

		$this->template->views('usia/home', $data);
	}
	public function tampil_usia() {
		
		$data['datausia'] = $this->M_master->get_id('ta_usia_web', "id ASC");
		$this->load->view('usia/list_data', $data);
	}
	public function wartawan() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Wartawan Liputan";
		$data['judul'] = " Wartawan Liputan";

		$this->template->views('wartawan/home', $data);
	}
	public function tampil_wartawan() {
		
		$data['datawartawan'] = $this->M_master->get_id('ta_wartawan_liputan', "id ASC");
		$this->load->view('wartawan/list_data', $data);
	}
	public function update_berita() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Update Berita";
		$data['judul'] = " Update Berita";

		$this->template->views('update_berita/home', $data);
	}
	public function tampil_update_berita() {
		
		$data['dataupdate_berita'] = $this->M_master->get_id('ta_update_berita', "id ASC");
		$this->load->view('update_berita/list_data', $data);
	}
	public function khusus() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Halaman Khusus";
		$data['judul'] = " Halaman Khusus";

		$this->template->views('khusus/home', $data);
	}
	public function tampil_khusus() {
		
		$data['datakhusus'] = $this->M_master->get_id('ta_halaman_khusus', "id ASC");
		$this->load->view('khusus/list_data', $data);
	}
	public function cetak() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Mesin Cetak";
		$data['judul'] = " Mesin Cetak";

		$this->template->views('cetak/home', $data);
	}
	public function tampil_cetak() {
		
		$data['datacetak'] = $this->M_master->get_id('ta_mesin_cetak', "id ASC");
		$this->load->view('cetak/list_data', $data);
	}
	public function kompetensi() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Kompetensi Wartawan";
		$data['judul'] = " Kompetensi Wartawan";

		$this->template->views('kompetensi/home', $data);
	}
	public function tampil_kompetensi() {
		
		$data['datakompetensi'] = $this->M_master->get_id('ta_kompetensi_wartawan', "id ASC");
		$this->load->view('kompetensi/list_data', $data);
	}
	public function sps() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Terdaftar SPS";
		$data['judul'] = " Terdaftar SPS";

		$this->template->views('sps/home', $data);
	}
	public function tampil_sps() {
		
		$data['datasps'] = $this->M_master->get_id('ta_terdaftar_sps', "id ASC");
		$this->load->view('sps/list_data', $data);
	}
	public function jumlah_oplah() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Jumlah Oplah";
		$data['judul'] = " Jumlah Oplah";

		$this->template->views('jumlah_oplah/home', $data);
	}
	
	public function tampil_jumlah_oplah() {
		
		$data['datajumlah_oplah'] = $this->M_master->get_id('ta_jumlah_oplah', "id ASC");
		$this->load->view('jumlah_oplah/list_data', $data);
	}

	public function klasifikasi() {
		$data['userdata'] = $this->userdata;
		$data['dataKategori'] = $this->M_master->select_all_kategori();

		$data['page'] = "Master";
		$data['subpage'] = "Klasifikasi";
		$data['judul'] = "Data Klasifikasi";
		$data['deskripsi'] = "Manage Data Klasifikasi";

		$data['modal_tambah_klasifikasi'] = show_my_modal('modals/modal_tambah_klasifikasi', 'tambah-klasifikasi', $data);

		$this->template->views('klasifikasi/home', $data);
	}

	public function tampilKlasifikasi() {
		$data['dataKlasifikasi'] = $this->M_master->get_klasifikasi();
		$this->load->view('klasifikasi/list_data', $data);
	}

	public function prosesTambahKlasifikasi() {
		$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->insertKlasifikasi($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Klasifikasi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Klasifikasi Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function updateKlasifikasi() {
		$id = trim($_POST['id']);

		$data['dataKlasifikasi'] = $this->M_master->select_by_id($id);
		$data['dataKategori'] = $this->M_master->select_all_kategori();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_klasifikasi', 'update-klasifikasi', $data);
	}

	public function prosesUpdateKlasifikasi() {
		$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_master->updateKlasifikasi($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Klasifikasi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Klasifikasi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function deleteKlasifikasi() {
		$id = $_POST['id'];
		$result = $this->M_master->deleteKlasifikasi($id);

		if ($result > 0) {
			echo show_succ_msg('Data Klasifikasi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Klasifikasi Gagal dihapus', '20px');
		}
	}

	// public function tipe_kamar() {
	// 	$data['userdata'] = $this->userdata;
	// 	$data['dataTipe_kamar'] = $this->M_master->select_all_kategori();

	// 	$data['page'] = "Master";
	// 	$data['subpage'] = "Klasifikasi";
	// 	$data['judul'] = "Data Klasifikasi";
	// 	$data['deskripsi'] = "Manage Data Klasifikasi";

	// 	$data['modal_tambah_klasifikasi'] = show_my_modal('modals/modal_tambah_klasifikasi', 'tambah-klasifikasi', $data);

	// 	$this->template->views('klasifikasi/home', $data);
	// }

	// public function tampilTipe_kamar() {
	// 	$data['dataKlasifikasi'] = $this->M_master->get_klasifikasi();
	// 	$this->load->view('klasifikasi/list_data', $data);
	// }

	// public function prosesTambahKlasifikasi() {
	// 	$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'trim|required');
	// 	$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');

	// 	$data = $this->input->post();
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$result = $this->M_master->insertKlasifikasi($data);

	// 		if ($result > 0) {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_succ_msg('Data Klasifikasi Berhasil ditambahkan', '20px');
	// 		} else {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_err_msg('Data Klasifikasi Gagal ditambahkan', '20px');
	// 		}
	// 	} else {
	// 		$out['status'] = 'form';
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 	}

	// 	echo json_encode($out);
	// }

	// public function updateKlasifikasi() {
	// 	$id = trim($_POST['id']);

	// 	$data['dataKlasifikasi'] = $this->M_master->select_by_id($id);
	// 	$data['dataKategori'] = $this->M_master->select_all_kategori();
	// 	$data['userdata'] = $this->userdata;

	// 	echo show_my_modal('modals/modal_update_klasifikasi', 'update-klasifikasi', $data);
	// }

	// public function prosesUpdateKlasifikasi() {
	// 	$this->form_validation->set_rules('nama_klasifikasi', 'Nama Klasifikasi', 'trim|required');
	// 	$this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');

	// 	$data = $this->input->post();
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$result = $this->M_master->updateKlasifikasi($data);

	// 		if ($result > 0) {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_succ_msg('Data Klasifikasi Berhasil diupdate', '20px');
	// 		} else {
	// 			$out['status'] = '';
	// 			$out['msg'] = show_succ_msg('Data Klasifikasi Gagal diupdate', '20px');
	// 		}
	// 	} else {
	// 		$out['status'] = 'form';
	// 		$out['msg'] = show_err_msg(validation_errors());
	// 	}

	// 	echo json_encode($out);
	// }

	// public function deleteKlasifikasi() {
	// 	$id = $_POST['id'];
	// 	$result = $this->M_master->deleteKlasifikasi($id);

	// 	if ($result > 0) {
	// 		echo show_succ_msg('Data Klasifikasi Berhasil dihapus', '20px');
	// 	} else {
	// 		echo show_err_msg('Data Klasifikasi Gagal dihapus', '20px');
	// 	}
	// }

}
