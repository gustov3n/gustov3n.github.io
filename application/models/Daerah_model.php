<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daerah_model extends CI_Model {

    function getkec($id_kab, $searchTerm)
    {        
        $this->db->select('id_kec, nama_kec');
        $this->db->like('nama_kec',$searchTerm);
        $this->db->order_by('id_kec', 'asc');
        $fetched_records = $this->db->get('kecamatan');
        $datakec = $fetched_records->result_array();
 
        $data = array();
        foreach ($datakec as $kec) {
            $data[] = array("id" => $kec['id_kec'], "text" => $kec['nama_kec']);
        }
        return $data;
    }
 
    function getkel($id_kec, $searchTerm = "")
    {        
        $this->db->select('id_kel, nama_kel');
        $this->db->where('id_kec', $id_kec);
        $this->db->where("nama_kel like '%" . $searchTerm . "%' ");    
        $this->db->order_by('id_kel', 'asc');
        $fetched_records = $this->db->get('kelurahan');
        $datakel = $fetched_records->result_array();
 
        $data = array();
        foreach ($datakel as $kel) {
            $data[] = array("id" => $kel['id_kel'], "text" => $kel['nama_kel']);
        }
        return $data;
    }    

    public function getAllKecamatan()
    {
        return $this->db->get('kecamatan')->result_array();
    }

    public function getKeca($noreg)
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        $this->db->join('tbl_bengkel','kecamatan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->where('tbl_bengkel.noreg',$noreg);
        return $this->db->get()->row_array();
    }

    public function getKelu($noreg)
    {
        $this->db->select('*');
        $this->db->from('kelurahan');
        $this->db->join('tbl_bengkel','kelurahan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->where('tbl_bengkel.noreg',$noreg);
        return $this->db->get()->row_array();
    }

    public function getKecById($id)
    {
        return $this->db->get_where('kecamatan',['id_kec'=>$id])->row_array();
    }

    public function getKelById($id)
    {
        return $this->db->get_where('kelurahan',['id_kel'=>$id])->row_array();
    }


}
