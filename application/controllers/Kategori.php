<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Kategori_Model');
        $this->load->model('Auth_Model');
		if(!$this->Auth_Model->current_user()){
			redirect(site_url());
		}
    }

    public function index()
	{
        $data = [
            'kategori' => $this->Kategori_Model->TampilData(),
        ];
        
		$this->load->view('kategori/index', $data);
	}

    public function tambah()
    {        
        $this->load->view('kategori/tambah');
    }

    public function insert()
    {
        $rules = [
			[
				'field' => 'nama_kategori', 
				'label' => 'Nama Kategori', 
				'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
			],
		];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('kategori/tambah');
        }

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        $this->Kategori_Model->TambahData($data);
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('kategori');
    }

    public function edit($id)
    {
        $data = [
            'kategori' => $this->Kategori_Model->DetailData($id),
        ];
        $this->load->view('kategori/edit', $data);
    }

    public function update($id)
    {
        $rules = [
			[
				'field' => 'nama_kategori', 
				'label' => 'Nama Kategori', 
				'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
			],
		];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return redirect('edit-kategori/'. $id);
        }

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];  

        $this->Kategori_Model->EditData($id, $data);
        $this->session->set_flashdata('success', 'Data Berhasil Diedit');
        redirect('kategori');
    }

    public function delete($id)
    {
        $this->Kategori_Model->HapusData($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('kategori');
    }
}