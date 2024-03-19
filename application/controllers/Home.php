<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_Model');
		if(!$this->Auth_Model->current_user()){
			redirect(site_url());
		}
	}
	public function index()
	{
		$data = [
			'title' => 'Home',
		];
		$this->load->view('Home/home', $data);
	}
}
