<?php

class Kategori_Model extends CI_Model {

    public function TampilData()
    {
        return $this->db->get('tb_kategori')->result();
    }

    public function DetailData($id)
    {
        return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row();
    }

    public function TambahData($data)
    {
        $this->db->insert('tb_kategori', $data);
    }

    public function EditData($id, $data)
	{
		$this->db->update('tb_kategori', $data, ['id_kategori' => $id]);
	}

    public function HapusData($id)
	{
		$this->db->delete('tb_kategori', ['id_kategori' => $id]);
	}
}