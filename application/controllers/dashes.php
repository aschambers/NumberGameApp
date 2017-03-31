<?php
class Dashes extends CI_Controller {
	public function index() {
		$this->load->view('main');
	}

	public function sign() {
		$this->load->view('signin');
	}

	public function add() {
		$this->load->view('add');
	}

	public function register_new() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

		$users = $this->User->retrieve_all();
		if ($this->form_validation->run() === true)
		{
			if (empty($users))
			{
				$info = array (
					"first_name" => "{$this->input->post('first_name')}",
					"last_name" => "{$this->input->post('last_name')}",
					"email" => "{$this->input->post('email')}",
					"password" => "{$this->input->post('password')}",
					"admin" => 1
				);
				$this->User->register_user($info);
				redirect('/');
			}
			else 
			{
				$info = array (
					"first_name" => "{$this->input->post('first_name')}",
					"last_name" => "{$this->input->post('last_name')}",
					"email" => "{$this->input->post('email')}",
					"password" => "{$this->input->post('password')}",
					"admin" => 0
				);
				$this->User->register_user($info);
				redirect('/');
			}
		}

		else
		{
			$this->session->set_flashdata("register_errors", "<p class='errors'>Invalid information entered</p>");
			redirect('add');
		}
	}

	public function sign_in() {
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$user = $this->User->retrieve_user_by_email($email);

		if ($this->form_validation->run() === true)
		{
			if ($user && $user['password'] === $password)
			{
				$user_info = array(
					"user_id" => $user['id'],
					"user_email" => $user['email'],
					"user_last_name" => $user['last_name'],
					"user_first_name" => $user['first_name'],
					"user_admin" => $user['admin'],
					"user_created_at" => $user['created_at'],
					"logged_in" => true
				);
				$this->session->set_userdata($user_info);
				redirect('login_success');
			}
			else
			{
				$this->session->set_flashdata("wrong_info", "<p class=errors>Wrong email or password</p>");
				redirect('sign');
			}
		}
		else
		{
			$this->session->set_flashdata("wrong_info", "<p class=errors>Please fill out all fields</p>");
			redirect('sign');
		}
	}

	public function login_success() {
		$this->load->model('User');
		$user_info = $this->User->retrieve_all();
		if ($this->session->userdata('logged_in') === true && $this->session->userdata('user_admin') === '1')
		{
			$this->load->view('admin_dash', array("user_info" => $user_info));
		}
		else if ($this->session->userdata('logged_in') === true && $this->session->userdata('user_admin') === '0')
		{
			$this->load->view('dash', array("user_info" => $user_info));
		}
		else
		{
			redirect('sign');
		}
	}

}





?>