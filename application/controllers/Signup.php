<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		
		// Handle form request

		if ($_POST) {
			
		
			
			
			// validation
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run()) 
			{
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				
				$this->load->model('user_model');
				$this->user_model->add_user($first_name, $last_name, $email, $password);

				//$this->load->view('login');
				//redirect('login');
				echo "Signup Done";
			}
			else
			{
				redirect('signup');
			}
			// if exist in database then set session

			$this->session->set_logindata('first_name');			
			
			 
			
			// if not produce error redirect to login
			
	}
	$this->load->view('signuppage');
	}
	public function login_user()
	{
		if ($_POST) 
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run()) 
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->model('user_model');
				$user = $this->user_model->get_user_for_login($email, $password);

				if ($user) 
				{
					$this->session->set('first_name', $user->first_name);
					$this->session->set('user_id', $user->id);
					redirect('dashboard');
				}else
				{
					redirect('register/login');
				}


			}
		}
		$this->load->view('login');
	}
}



?>