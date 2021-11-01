<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	public function select_all_user(){
		$this->db->select('tu.*, ju.nama_jenis_user');
		$this->db->from('ta_user tu');
		$this->db->join('ta_jenis_user ju', 'ju.id = tu.jenis_user', 'left');
		$this->db->order_by('id ASC');
		$query = $this->db->get();
		return $query->result();
	}

	Function select_all($table_name,  $order = null)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order);
		$query = $this->db->get();
		return $query->result();
	}

	public function select_by_id($id) {
		$this->db->from('ta_user');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($tbl, $id) {
		$sql = "DELETE FROM $tbl WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update_data($tbl, $data, $id) {
		$this->db->where("id", $id);
		$this->db->update($tbl, $data);
		return $this->db->affected_rows();
	}

	// Function get_id($table_name, $where, $order = null)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($table_name);
	// 	$this->db->where('id_kabupaten', $where);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function get_kec($id_kecamatan) {
	// 	$this->db->select('kel.*, kec.nama_kecamatan as nama_kec');
	// 	$this->db->from('kelurahan kel');
	// 	$this->db->like('kel.id_kecamatan', $id_kecamatan, 'both');
	// 	$this->db->join('kecamatan kec', 'kec.id_kecamatan = kel.id_kecamatan', 'left');
	// 	$this->db->order_by('kec.nama_kecamatan, kel.nama_kelurahan ASC');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	Function get_id($table_name,  $order = null)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order);
		$query = $this->db->get();
		return $query->result_array();
	}

	//get
	function get_data($table_name, $order = null)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		if ($order != null) {
			$this->db->order_by($order);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function insert_data($table_name, $data)
	{
		$this->db->trans_start();
		$this->db->insert($table_name, $data);
		// $this->db->insert($this->table_log, $log);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	// /

	public function get_klasifikasi(){
		$this->db->select('klaskel.*, katkec.nama_kategori as nama_kat');
		$this->db->from('tbl_klasifikasi klaskel');
		$this->db->join('tbl_kategori katkec', 'katkec.id = klaskel.id_kategori', 'left');
		$this->db->order_by('klaskel.id_kategori ASC');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function get_kategori(){
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}

	public function select_all_kategori() {
		$sql = "SELECT * FROM tbl_kategori";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function updateKlasifikasi($data) {
		$sql = "UPDATE tbl_klasifikasi SET nama_klasifikasi='" .$data['nama_klasifikasi'] ."', id_kategori='" .$data['id_kategori'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function deleteKlasifikasi($id) {
		$sql = "DELETE FROM tbl_klasifikasi WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertKlasifikasi($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO tbl_klasifikasi VALUES('','" .$data['nama_klasifikasi'] ."', " .$data['id_kategori'] .",'')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */