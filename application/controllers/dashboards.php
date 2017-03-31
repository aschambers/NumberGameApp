<?php
class Dashboards extends CI_Controller {
	public function index() {
		$this->load->model('User');
		$user_info = $this->User->retrieve_all();

		if ($this->session->userdata('user_admin') === '0')
		{
			$this->load->view('dash', array("user_info" => $user_info));
		}
		
		else if ($this->session->userdata('user_admin') === '1')
		{
			$this->load->view('admin_dash', array("user_info" => $user_info));
		}
	}

	public function admin() {
		$this->load->view('admin_dash');
	}


	public function new_add() {
		$this->load->view('new_user');
	}

	public function profile($user_id) {
		$this->load->model('User');
		$this->load->model('Message');
		$this->load->model('Comment');
		$user_comments = $this->Comment->get_comments($user_id);
		$user_messages = $this->Message->get_by_id($user_id);
		$user_info = $this->User->retrieve_user_by_id($user_id);
		$this->load->view('profile', array(
			"user_info" => $user_info, 
			"user_messages" => $user_messages, 
			"user_comments" => $user_comments
		));
	}

	public function edit_profile($user_id) {
		$this->load->model('User');
		$user_info = $this->User->retrieve_user_by_id($user_id);
		$this->load->view('edit_profile', array("user_info" => $user_info));
	}

	public function edit_user() {
		$user_id = $this->input->post('edit_btn');
		$this->load->model('User');
		$user_info = $this->User->retrieve_user_by_id($user_id);
		$this->load->view('edit_user', array('user_info' => $user_info));
	}

	public function create() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

		if ($this->form_validation->run() === true)
		{
			$info = array (
				"first_name" => "{$this->input->post('first_name')}",
				"last_name" => "{$this->input->post('last_name')}",
				"email" => "{$this->input->post('email')}",
				"password" => "{$this->input->post('password')}",
				"admin" => 0
			);
			$this->User->register_user($info);
			redirect('dash_home');
		}

		else
		{
			$this->session->set_flashdata("register_errors", "<p class='errors'>Invalid information entered</p>");
			redirect('new');
		}
	}

	public function edit_info() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$user_id = $this->input->post('save_btn');
		$user_info = array(
			"email" => $this->input->post('email'),
			"first_name" => $this->input->post('first_name'),
			"last_name" => $this->input->post('last_name'),
			"admin" => $this->input->post('admin')
		);
		if ($this->form_validation->run() === true) {
			$this->User->update_user_info($user_info, $user_id);
			redirect('dash_home');
		}
		else
		{
			$this->session->set_flashdata("errors", "<p class='errors'>Please make sure nothing is blank</p>");
			redirect('dash_home');
		}
	}

	public function edit_info_profile() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$user_id = $this->input->post('save_btn');
		$user_info = array(
			"email" => $this->input->post('email'),
			"first_name" => $this->input->post('first_name'),
			"last_name" => $this->input->post('last_name'),
			"admin" => $this->input->post('user_level')
		);
		if ($this->form_validation->run() === true) {
			$this->User->update_user_info($user_info, $user_id);
			redirect('dash_home');
		}
		else
		{
			$this->session->set_flashdata("errors", "<p class='errors'>Please make sure nothing is blank</p>");
			redirect('dash_home');
		}
	}

	public function edit_pass() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); // Not sure if glitched. MD5 doesn't work.
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$encrypted_pass = md5($this->input->post('password'));
		$info = array("password" => "{$encrypted_pass}");
		$user_id = $this->input->post('passchange_btn');
		
		if ($this->form_validation->run() === true) {

			$this->User->change_pass($info, $user_id);
			redirect('dash_home');
		}
		
		else
		{
			$this->session->set_flashdata("errors", "<p class='errors'>Please make sure nothing is blank</p>");
			redirect('dash_home');
		}
	}

	public function edit_description() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		$info = array("description" => $this->input->post('description'));
		$user_id = $this->input->post('desc_btn');
		if ($this->form_validation->run() === true) {
			$this->User->update_desc($info, $user_id);
			redirect('dash_home');
		}
		else
		{
			redirect('dash_home');
		}
	}

	public function new_message() {
		$this->load->model('Message');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		$user_id = $this->session->userdata('user_id');
		$profile_id = $this->input->post('message_btn');
		$content = array("message" => $this->input->post('message'));

		if ($this->form_validation->run() === true) {
			$this->Message->post_message($content, $user_id, $profile_id);
			redirect('dash_home');
		}
		else
		{
			redirect('dash_home');
		}
		
	}

	public function new_comment() {
		$this->load->model('Comment');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required');

		$message_id = $this->input->post('id_for_message');
		$poster_id = $this->input->post('comment_btn');
		$content = array("comment" => $this->input->post('comment'));

		if ($this->form_validation->run() === true) {
			$this->Comment->post_comment($content, $message_id, $poster_id);
			redirect('dash_home');
		}
		else
		{
			redirect('dash_home');
		}
	}

	public function remove() {
		$this->load->model('User');
		$user_id = $this->input->post('remove_btn');
		$this->User->delete_by_id($user_id);
		redirect('dash_home');
	}

	public function log_out() {
		$this->session->sess_destroy();
		redirect('/');
	}
}






?>