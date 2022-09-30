<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

	public function getUserPage($limit,$start,$cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role','tbl_role.id_role=tbl_user.role_id','left');

        if (!empty($cari)) {
            $this->db->like('tbl_user.nama_lengkap', $cari);
        }

        $this->db->order_by('tbl_user.sort','ASC');
        $this->db->where('tbl_user.id_user >',2);

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countUserPage($cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role','tbl_role.id_role=tbl_user.role_id','left');
        if (!empty($cari)) {
            $this->db->like('tbl_user.nama_lengkap', $cari);
        }
        $this->db->where('tbl_user.id_user >',2);
        return $this->db->count_all_results();   
	}

	public function tambahUser()
	{
		$data=
		[
			'nama_lengkap' 	=> htmlspecialchars($this->input->post('nama')),
			'username' 		=> htmlspecialchars($this->input->post('username')),
			'password' 		=> password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
			'role_id' 		=> htmlspecialchars($this->input->post('role')),
			'is_active'		=> 0,
		];

		$this->db->insert('tbl_user',$data);
	}

	public function registrasi()
	{
		$data=
		[
			'nama_lengkap' 	=> htmlspecialchars($this->input->post('nama')),
			'username' 		=> htmlspecialchars($this->input->post('username')),
			'password' 		=> password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
			'role_id' 		=> 3,
			'is_active'		=> 0,
		];

		$this->db->insert('tbl_user',$data);
	}

	public function ubahUser($id)
	{
		$data=
		[
			'nama_lengkap' 	=> htmlspecialchars($this->input->post('nama')),
			'role_id' 		=> htmlspecialchars($this->input->post('role')),
		];

		$this->db->where('id_user',$id);
		$this->db->update('tbl_user',$data);
	}

	public function statusUser($status,$id)
	{
		$this->db->where('tbl_user.id_user',$id);
		$this->db->update('tbl_user',['is_active'=>$status]);
	}

	public function hapusUser($id)
	{
		$this->db->where('tbl_user.id_user',$id);
		$this->db->delete('tbl_user');
	}

	public function getAllUser()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('tbl_user.id_user!=',1);
		$this->db->where('tbl_user.id_user!=',2);
        $this->db->order_by('tbl_user.sort','ASC');
		// $this->db->order_by('tbl_user.nama_lengkap','ASC');
		return $this->db->get()->result_array();
	}

	public function getUserLogin($username)
	{
		return $this->db->get_where('tbl_user',['username'=>$username])->row_array();
	}

	public function updatePassword($username)
	{
		$this->db->where('tbl_user.username',$username);
		$this->db->update('tbl_user',['password'=>password_hash(htmlspecialchars($this->input->post('newpwd')), PASSWORD_DEFAULT)]);
	}

	public function resetPassword($id)
	{
		$password='admin'.date('Ymd');
		$data=
		[
			'password' 		=> password_hash(htmlspecialchars($password), PASSWORD_DEFAULT),
			'reset' 		=> $password,
		];

		$this->db->where('tbl_user.id_user',$id);
		$this->db->update('tbl_user',$data);
	}

	public function cekUser($username)
	{
		return $this->db->get_where('tbl_user',['username'=>$username])->num_rows();
	}













} // END CLASS