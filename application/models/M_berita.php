<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	Function select_all($table_name,  $order = null)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order);
		$query = $this->db->get();
		return $query->result();
	}

	public function select_all_berita(){
		$this->db->select('tb.*, ttb.tipe_berita, tu.nama');
		$this->db->from('ta_berita tb');
		$this->db->join('ta_tipe_berita ttb', 'ttb.id = tb.id_tipe_berita', 'left');
		$this->db->join('ta_user tu', 'tu.id = tb.id_user', 'left');
		$this->db->order_by('id');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data) {
		$this->db->insert("ta_berita", $data);
		return $this->db->affected_rows();
	}

	public function select_by_id($id) {
		$this->db->from('ta_berita');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function ubah($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("ta_berita", $data);
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE ta_jenis_user SET nama='" .$data['nama'] ."', telp='" .$data['telp'] ."', id_kota=" .$data['kota'] .", id_kelamin=" .$data['jk'] .", id_posisi=" .$data['posisi'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM ta_berita WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO ta_jenis_user VALUES('{$id}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('ta_jenis_user', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('ta_jenis_user');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('ta_jenis_user');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */