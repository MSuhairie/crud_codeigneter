<?php 
class Auth_Model extends CI_Model {
	const SESSION_KEY = 'user_id';

	public function login($username, $password)
	{
        $user = $this->db->get_where('tb_user', ['username' => $username])->row();

		// cek apakah username sudah terdaftar?
		if (!$user) {
			$this->session->set_flashdata('error', 'Username yang anda masukkan salah');
			redirect(site_url());
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->password)) {
			$this->session->set_flashdata('error', 'Password yang anda masukkan salah');
			redirect(site_url());
		}

		$data = [
			'id_user' => $user->id_user,
			'nama' => $user->nama,
			'username' => $user->username,
		];

		// bikin session
		$this->session->set_userdata($data);
		$this->session->set_userdata([self::SESSION_KEY => $user->id_user]);
		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$id_user = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where('tb_user', ['id_user' => $id_user]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}