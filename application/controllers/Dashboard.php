<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() 
	{
		parent::__construct();

		// check if user loggedin
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function test()
	{
		die("fsd");
		$this->load->view('welcome_message');
	}
}
