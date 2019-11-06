<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('user_model');

		// check if user loggedin
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		//get the model function name into an array
		$data['result'] = $this->user_model->get_user_details();
		$this->load->view('register/homepage', $data);

		//$this->load->view('welcome_message');
	}
	public function edit_user()
	{

		$id = $this->input->get('id');

		$get_row_record = $this->user_model->get_update_user_id($id);

		$data['id'] = $id;
		$data['first_name'] = $get_row_record->first_name;
		$data['last_name'] = $get_row_record->last_name;
		$data['email'] = $get_row_record->email;
		$data['password'] = $get_row_record->password;

		$this->load->view('edit_user_details', $data);

		if($_POST)
		{
			//$this->load->form_validation();

			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if($this->form_validation->run())
			{

				$id = $this->input->post('id');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$this->user_model->update_user_details($id, $first_name, $last_name, $email, $password);

				echo "Row Update Successfully";
				redirect('dashboard');
			}
		}
		//die("fsd");

		//$this->load->view('edit_user_details');
	}
	public function logout()
	{

		//echo anchor('register/login', 'Logout');
		$this->session->unset_userdata('user_id');
		redirect('register/login');
	}
}
