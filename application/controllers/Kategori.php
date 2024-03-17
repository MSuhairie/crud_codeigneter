<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Kategori_Model');
    }

    public function index()
	{
        $data = [
            'meta' => ['title' => 'Data Kategori'],
            'kategori' => $this->Kategori_Model->TampilData(),
        ];
        
		$this->load->view('kategori/index', $data);
	}

    public function tambah()
    {        
        $data = [
            'meta' => ['title' => 'Tambah Kategori'],
        ];
        $this->load->view('kategori/tambah', $data);
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
            // Jika validasi gagal, kembali ke halaman tambah dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('tambah-kategori');
        } else {
            // Jika validasi berhasil, simpan data dan kembali ke halaman kategori
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
            ];
    
            $this->Kategori_Model->TambahData($data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('kategori');
        }
    }

    public function edit($id)
    {
        $data = [
            'meta' => ['title' => 'Edit Kategori'],
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
            // Jika validasi gagal, kembali ke halaman tambah dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('edit-kategori/'. $id);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
            ];  

            $this->Kategori_Model->EditData($id, $data);
            $this->session->set_flashdata('success', 'Data Berhasil Diedit');
            redirect('kategori');
        }
    }

    public function delete($id)
    {
        $this->Kategori_Model->HapusData($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('kategori');
    }
}