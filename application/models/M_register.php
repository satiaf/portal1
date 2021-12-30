<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {

	public function select_by_id($tbl, $id) {
		$this->db->from($tbl);
		$this->db->where('id_user', $id);
		$query = $this->db->get();
		return $query->row();
	}
}