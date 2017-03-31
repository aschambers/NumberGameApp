<?php

class Message extends CI_Model {
	public function get_by_id($user_id) {
		$query = "SELECT users.first_name, users.last_name, messages.message, messages.user_id as poster_id, messages.id as message_id, messages.created_at
				  FROM users
				  JOIN messages on users.id = messages.user_id
				  WHERE messages.received_by = ?";
		$values = array($user_id);
		return $this->db->query($query, $values)->result_array();
	}

	public function post_message($content, $user_id, $profile_id) {
		$query = "INSERT INTO messages (user_id, message, received_by, created_at)
				  VALUES (?,?,?,?)";
		$values = array($user_id, $content['message'], $profile_id, date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}
}

?>