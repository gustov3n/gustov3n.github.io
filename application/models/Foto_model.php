<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_model extends CI_Model{

    public function uploadFoto($noreg,$namafile,$aktif)
    {
        $data=
        [
            'bengkel_kode' 	=> $noreg,
            'nama_file'     => $namafile,
            'aktif' 	    => $aktif
        ];

        $this->db->insert('tbl_foto',$data);
    }

    public function getFotoByKode($noreg)
    {
        return $this->db->get_where('tbl_foto',['bengkel_kode'=>$noreg])->result_array();
    }

    public function getFotoAktif($noreg)
    {
        return $this->db->get_where('tbl_foto',['bengkel_kode'=>$noreg,'aktif'=>1])->row_array();
    }

    public function jmlFotoByKode($noreg)
    {
        return $this->db->get_where('tbl_foto',['bengkel_kode'=>$noreg])->num_rows();
    }

    public function hapusFoto($id)
    {
        $this->db->where('tbl_foto.id_foto',$id);
        $this->db->delete('tbl_foto');
    }

    public function hapusFotoBengkel($noreg)
    {
        $this->db->where('tbl_foto.bengkel_kode',$noreg);
        $this->db->delete('tbl_foto');
    }



} // END CLASS