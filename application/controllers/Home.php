<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['meta'] = [
			'title' => 'Home',
		];
		$this->load->view('Home/home', $data);
	}
}
