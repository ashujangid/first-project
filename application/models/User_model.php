<?php

class User_model extends CI_Model
{
	public function get_user_for_login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_users');
		$result = $query->row();
		return $result;
	}
}