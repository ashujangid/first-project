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
	public function add_user($first_name, $last_name, $email, $password)
	{
		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('email', $email);
		$this->db->set('password', $password);
		$result = $this->db->insert('tbl_users');
		return $result;
	}
	public function get_user_details()
	{
		$query = $this->db->get('tbl_users');
		return $query->result();
	}
	public function update_user_details($id, $first_name, $last_name, $email, $password)
	{
		$this->db->where('id', $id);
		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('email', $email);
		$this->db->set('password', $password);
		$this->db->update('tbl_users');
	}
	public function get_update_user_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_users');
		$result = $query->row();
		return $result;
	}
}