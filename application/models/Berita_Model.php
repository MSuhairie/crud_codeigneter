<?php

class Berita_Model extends CI_Model {

    public function TampilData()
    {
        return $this->db->get('tb_berita')->result();
    }

    public function DetailData($id)
    {
        return $this->db->get_where('tb_berita', ['id_berita' => $id])->row();
    }

    public function TambahData($data)
    {
        $this->db->insert('tb_berita', $data);
    }

    public function EditData($id, $data)
	{
		$this->db->update('tb_berita', $data, ['id_berita' => $id]);
	}

    public function HapusData($id)
	{
		$this->db->delete('tb_berita', ['id_berita' => $id]);
	}
}