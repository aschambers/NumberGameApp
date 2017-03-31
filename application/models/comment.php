<?php

class Comment extends CI_Model {
	public function get_comments($user_id) {
		$query = "SELECT comments.comment, comments.created_at, comments.message_id as message_id, comments.sent_by as sender, users.id as commenter_id, users.first_name, users.last_name
				  FROM users
				  JOIN messages ON users.id = messages.user_id
				  JOIN comments ON messages.id = comments.message_id
				  WHERE comments.sent_by = ?";
		$values = array($user_id);
		return $this->db->query($query, $values)->result_array();
	}

	public function post_comment($content, $message_id, $poster_id) {
		$query = "INSERT INTO comments (message_id, comment, sent_by, created_at)
				  VALUES (?,?,?,?)";
		$values = array($message_id, $content['comment'], $poster_id, date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}
}

?>