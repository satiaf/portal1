<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_master');
	}

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

	public function expired() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Master";
		$data['subpage'] = "Expired Web ";
		$data['judul'] = " Expired Web";

		$this->template->views('expired/home', $data);
	}
	public function tampil_expired() {
		
		$data['dataexpired'] = $this->M_master->get_id('ta_expired_web', "id ASC");
		$this->load->view('expired/list_data', $data);
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
