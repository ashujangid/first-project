<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		// Handle form request
		if ($_POST) {
			
			// validation
			
			// check in database
			
			// if exist in database then set session 
			
			// if not produce error redirect to login
		}

		$this->load->view('register/index');
	}

	public function login()
	{
		// check if user already loggedin
		if ($this->session->userdata('user_id')) {
			redirect('dashboard');
		}

		// Handle form request
		if ($_POST) {

			// validation
			$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email',
				array('required' => 'Email is required to login',
					'valid_email' => 'Please enter valid email address'
				));
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run()) {
				
				$this->load->model('user_model');

				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$user = $this->user_model->get_user_for_login($email, $password);

				if ($user) {

					if ($user->status == "Active") {
						$this->session->set_userdata('user_id', $user->id);
						$this->session->set_userdata('email', $user->email);
						$this->session->set_userdata('first_name', $user->first_name);
						redirect('dashboard');
					
					} else {
						$this->session->set_userdata('error_message', "User Inactive");
						redirect('login');
					}

				} else {
					$this->session->set_userdata('error_message', "Invalid Login");
					redirect('login');
				}
			}
		}
		$this->load->view('register/login');
	}
}
