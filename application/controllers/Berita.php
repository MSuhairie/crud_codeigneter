<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Berita_Model');
        $this->load->model('Auth_Model');
		if(!$this->Auth_Model->current_user()){
			redirect(site_url());
		}
    }

    public function index()
	{
        $data = [
            'berita' => $this->Berita_Model->TampilData(),
        ];
        
		$this->load->view('berita/index', $data);
	}

    public function tambah()
    {        
        $this->load->view('berita/tambah');
    }

    public function insert()
    {
        $rules = [
			[
				'field' => 'judul', 
				'label' => 'Judul', 
				'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
			],
            [
				'field' => 'isi', 
				'label' => 'Isi', 
				'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
			],
            [
				'field' => 'tanggal', 
				'label' => 'Tanggal', 
				'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
			],
		];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('berita/tambah');
        }

        $config['upload_path']   = './uploads/'; // Direktori tujuan upload
        $config['allowed_types'] = 'jpeg|jpg|png'; // Tipe file yang diperbolehkan
        $config['max_size']      = 2048; // Batas maksimum ukuran file (dalam kilobita)
        $config['file_name']     = uniqid(); 
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        $gambar_data = $this->upload->data('file_name');

        $data = [
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
            'gambar' => $gambar_data
        ];

        $this->Berita_Model->TambahData($data);
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        redirect('berita');
    }

    public function edit($id)
    {
        $data = [
            'berita' => $this->Berita_Model->DetailData($id),
        ];
        $this->load->view('berita/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            [
                'field' => 'judul', 
                'label' => 'Judul', 
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
            ],
            [
                'field' => 'isi', 
                'label' => 'Isi', 
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
            ],
            [
                'field' => 'tanggal', 
                'label' => 'Tanggal', 
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Wajib Diisi',
                ]    
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            return redirect('berita-kategori/'. $id);
        }

        $gambar_lama = $this->Berita_Model->DetailData($id);

        $data = [
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
        ];

        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = uniqid(); 
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');

            if (!empty($gambar_lama->gambar) && file_exists('./uploads/' . $gambar_lama->gambar)) {
                unlink('./uploads/' . $gambar_lama->gambar);
            }

            $data['gambar'] = $this->upload->data('file_name');
        }

        $this->Berita_Model->EditData($id, $data);
        $this->session->set_flashdata('success', 'Data Berhasil Diedit');
        redirect('berita');
    }


    public function delete($id)
    {
        $data_berita = $this->Berita_Model->DetailData($id);
        if (!empty($data_berita->gambar) && file_exists('./uploads/' . $data_berita->gambar)) {
            unlink('./uploads/' . $data_berita->gambar);
        }
        $this->Berita_Model->HapusData($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('berita');
    }
}