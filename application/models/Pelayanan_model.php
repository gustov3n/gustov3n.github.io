<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan_model extends CI_Model{

	public function getPelayananPage($limit,$start,$cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_pelayanan');
        if (!empty($cari)) {
            $this->db->like('nama_ply', $cari);
        }

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countPelayananPage($cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_pelayanan');
        $this->db->like('nama_ply', $cari);
        return $this->db->count_all_results();   
	}

    public function tambahPelayanan()
    {
        $data=
        [
            'kode_ply'  => htmlspecialchars($this->input->post('kode')),
            'nama_ply'  => htmlspecialchars($this->input->post('nama')),
        ];

        $this->db->insert('tbl_pelayanan',$data);
    }

    public function ubahPelayanan($id)
    {
        $data=
        [
            'kode_ply'  => htmlspecialchars($this->input->post('kode')),
            'nama_ply'  => htmlspecialchars($this->input->post('nama')),
        ];

        $this->db->where('id_ply',$id);
        $this->db->update('tbl_pelayanan');
    }

    public function hapusPelayanan($id)
    {
        $this->db->where('id_ply',$id);
        $this->db->delete('tbl_pelayanan');
    }

    public function getPelayanan()
    {
        return $this->db->get('tbl_pelayanan')->result_array();
        // $this->db->select('*');
        // $this->db->from('tbl_pelayanan');
        // $this->db->join('tbl_layananbengkel','tbl_layananbengkel.ply_kode=tbl_pelayanan.kode_ply','left');
        // $this->db->join('tbl_bengkel','tbl_bengkel.noreg=tbl_layananbengkel.noreg','left');

        // return $this->db->get()->result_array();
    }











} // END CLASS