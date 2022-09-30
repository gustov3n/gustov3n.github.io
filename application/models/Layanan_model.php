<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model{

	// public function getLayananByNoreg($noreg)
	// {
 //        return $this->db->get('tbl_pelayanan')->result_array();
	// }

	public function getLayananByNoreg($noreg)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelayanan');
		$this->db->join('tbl_layananbengkel','tbl_layananbengkel.ply_id=tbl_pelayanan.id_ply','left');
		$this->db->where('tbl_layananbengkel.noreg',$noreg);
		return $this->db->get()->result_array();
	}

	public function getLayananSet($idply,$noreg)
	{
		return $this->db->get_where('tbl_layananbengkel',['ply_id'=>$idply,'noreg'=>$noreg])->num_rows();
	}

	public function tambahLayananBengkel($noreg,$id)
	{
        $data=
        [
            'noreg'             => $noreg,
            'ply_id'          => $id
        ];

        $this->db->insert('tbl_layananbengkel',$data);
	}

	public function hapusLayananBengkel($noreg,$id)
	{
        $this->db->where('tbl_layananbengkel.noreg',$noreg);
        $this->db->where('tbl_layananbengkel.ply_id',$id);
        $this->db->delete('tbl_layananbengkel');
	}

    public function hapusLayanan($noreg)
    {
        $this->db->where('tbl_layananbengkel.noreg',$noreg);
        $this->db->delete('tbl_layananbengkel');
    }





} // END CLASS