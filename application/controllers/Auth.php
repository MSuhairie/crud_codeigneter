<?php 

class Auth extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_Model');
	}
    public function index()
    {
		if($this->Auth_Model->current_user()){
			redirect('home');
		}
        $this->load->view('Auth/login');
    }
	
    public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->Auth_Model->login($username, $password)){
			$this->session->set_flashdata('success', 'Berhasil Login');
            redirect('home');
		}
	}

	public function logout()
	{
		$this->Auth_Model->logout();
        $this->session->set_flashdata('success', 'Berhasil Logout');
		redirect(site_url());
	}

}   