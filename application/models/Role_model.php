<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model{

	public function getAllRole()
	{
		$this->db->select('*');
		$this->db->from('tbl_role');
		$this->db->where('id_role >',2);
		return $this->db->get()->result_array();
	}

	public function getRolePage($limit,$start,$cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_role');

        if (!empty($cari)) {
            $this->db->like('tbl_role.role', $cari);
        }

        $this->db->where('tbl_role.id_role >',2);

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countRolePage($cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_role');
        if (!empty($cari)) {
            $this->db->like('tbl_role.role', $cari);
        }
        $this->db->where('tbl_role.id_role >',2);
        return $this->db->count_all_results();   
	}

    public function allData($status,$id)
    {
        $this->db->where('tbl_role.id_role',$id);
        $this->db->update('tbl_role',['all_data'=>$status]);
    }

    public function getRoleById($id)
    {
    	return $this->db->get_where('tbl_role',['id_role'=>$id])->row_array();
    }

    public function tambahRole()
    {
    	$this->db->insert('tbl_role',['role' => htmlspecialchars($this->input->post('role'))]);
    }

    public function ubahRole($id)
    {
    	$this->db->where('id_role',$id);
    	$this->db->update('tbl_role',['role' => htmlspecialchars($this->input->post('role'))]);
    }

    public function settingHomePage($id)
    {
    	$this->db->where('id_role',$id);
    	$this->db->update('tbl_role',['default_page'=>htmlspecialchars($this->input->post('home'))]);
    }













} // END CLASS