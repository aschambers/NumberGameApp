<?php
class User extends CI_Model {
	public function register_user($info) {
		$query = "INSERT INTO users (first_name, last_name, email, password, admin, created_at) 
				  VALUES (?,?,?,?,?,?)";
		$values = array($info['first_name'], $info['last_name'], $info['email'], $info['password'], $info['admin'] ,date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}

	public function retrieve_user_by_email($email) {
		$query = "SELECT *
				  FROM users WHERE email = ?";
		$email = array($email);
		return $this->db->query($query, $email)->row_array();
	}

	public function retrieve_user_by_id($user_id) {
		$query = "SELECT *
				  FROM users WHERE id = ?";
		$user_id = array($user_id);
		return $this->db->query($query, $user_id)->row_array();
	}

	public function retrieve_all() {
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	public function delete_by_id($user_id) {
		$query = "DELETE FROM users WHERE id = ?";
		$user_id = array($user_id);
		return $this->db->query($query, $user_id);
	}

	public function update_user_info($info, $user_id) {
		$query = "UPDATE users SET users.email = ?, users.first_name = ?, users.last_name = ?, users.admin = ?
				  WHERE id = ?";
		$values = array($info['email'], $info['first_name'], $info['last_name'], $info['admin'], $user_id);
		return $this->db->query($query, $values);
	}

	public function change_pass($info, $user_id) {
		$query = "UPDATE users SET users.password = ? WHERE id = ?";
		$values = array($info['password'], $user_id);
		return $this->db->query($query, $values);
	}

	public function update_desc($info, $user_id) {
		$query = "UPDATE users SET users.description =? WHERE id = ?";
		$values = array($info['description'], $user_id);
		return $this->db->query($query, $values);
	}
}






?>