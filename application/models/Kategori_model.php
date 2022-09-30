<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model{

	public function getKategoriPage($limit,$start,$cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        if (!empty($cari)) {
            $this->db->like('nama_kategori', $cari);
        }

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countKategoriPage($cari)
	{
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->like('nama_kategori', $cari);
        return $this->db->count_all_results();   
	}

    public function getAllKategori()
    {
        return $this->db->get('tbl_kategori')->result_array();
    }












} // END CLASS