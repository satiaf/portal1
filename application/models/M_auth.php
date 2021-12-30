<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function login($user, $pass) {
		$this->db->select('*');
		$this->db->from('ta_user');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

	function insert_data($table_name, $data)
	{
		$this->db->trans_start();
		$this->db->insert($table_name, $data);
		// $this->db->insert($this->table_log, $log);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */