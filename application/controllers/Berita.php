<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_berita');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataBerita'] = $this->M_berita->select_all_berita();
		$data['dataTipe_berita'] = $this->M_berita->select_all('ta_tipe_berita', "id ASC");

		$data['page'] = "berita";
		$data['subpage'] = "";
		$data['judul'] = "Data Berita";
		$data['deskripsi'] = "Manage Data Berita";

		$data['modal_tambah_berita'] = show_my_modal('modals/modal_tambah_berita', 'tambah-berita', $data);

		$this->template->views('berita/home', $data);
	}

	public function tampil() {
		$data['dataBerita'] = $this->M_berita->select_all_berita();
		$this->load->view('berita/list_data', $data);
	}

	public function tambah() {
		$this->form_validation->set_rules('id_tipe_berita', 'Tipe Berita Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('ringkasan_berita', 'Ringkasan Berita Tidak Boleh Kosong', 'trim|required');

		$id = $this->userdata->id;
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/berita/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_berita->tambah($data);
			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data Berita Berhasil diubah'));
				redirect('Berita');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Berita Gagal diubah'));
				redirect('Berita');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Berita');
		}
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataBerita'] = $this->M_berita->select_by_id($id);
		$data['dataTipe_berita'] = $this->M_berita->select_all('ta_tipe_berita', "id ASC");

		echo show_my_modal('modals/modal_update_berita', 'update-berita', $data);
	}

	public function ubah() {
		$this->form_validation->set_rules('id_tipe_berita', 'Tipe Berita Tidak Boleh Kosong', 'trim|required');
		$this->form_validation->set_rules('ringkasan_berita', 'Ringkasan Berita Tidak Boleh Kosong', 'trim|required');

		$id = $_POST['id'];
		$data = $this->input->post();

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/berita/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_berita->ubah($data, $id);
			if ($result > 0) {
				$this->session->set_flashdata('msg', show_succ_msg('Data Berita Berhasil diubah'));
				redirect('Berita');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Berita Gagal diubah'));
				redirect('Berita');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Berita');
		}
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_berita->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Berita Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Berita Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_berita->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Berita Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Berita Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Nomor Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "ID Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "ID Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "ID Posisi");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Status");
		$rowCount++;

		foreach($data as $value){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
			$objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_kota); 
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->id_kelamin); 
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->id_posisi); 
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->status); 
			$rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pegawai.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pegawai.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_pegawai->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_kota'] = $value['D'];
							$resultData[$index]['id_kelamin'] = $value['E'];
							$resultData[$index]['id_posisi'] = $value['F'];
							$resultData[$index]['status'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_pegawai->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Pegawai Berhasil diimport ke database'));
						redirect('Pegawai');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pegawai Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Pegawai');
				}

			}
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */