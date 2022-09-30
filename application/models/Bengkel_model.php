<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bengkel_model extends CI_Model{

	public function getBengkelPage($limit,$start,$cari,$kategori,$kecamatan,$kelurahan)
	{
        $this->db->select('*');
        $this->db->from('tbl_bengkel');
        $this->db->join('tbl_kategori','tbl_kategori.kode_kategori=tbl_bengkel.kategori_kode');
        $this->db->join('kecamatan','kecamatan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->join('kelurahan','kelurahan.id_kel=tbl_bengkel.kel_id','left');
        
        if (!empty($kategori)) {
            $this->db->where('tbl_kategori.kode_kategori', $kategori);
        }
            
        if (!empty($kecamatan)) {
            $this->db->where('kecamatan.id_kec', $kecamatan);
        }
            
        if (!empty($kelurahan)) {
            $this->db->where('kelurahan.id_kel', $kelurahan);
        }

        if (!empty($cari)) {
            $this->db->like('nama_bengkel', $cari);
            $this->db->or_like('nama_pemilik', $cari);
            $this->db->or_like('hashtag', $cari);
        }

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countBengkelPage($cari,$kategori,$kecamatan,$kelurahan)
	{
        $this->db->select('*');
        $this->db->from('tbl_bengkel');
        $this->db->join('tbl_kategori','tbl_kategori.kode_kategori=tbl_bengkel.kategori_kode');
        $this->db->join('kecamatan','kecamatan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->join('kelurahan','kelurahan.id_kel=tbl_bengkel.kel_id','left');
        
        if (!empty($kategori)) {
            $this->db->where('tbl_kategori.kode_kategori', $kategori);
        }
            
        if (!empty($kecamatan)) {
            $this->db->where('kecamatan.id_kec', $kecamatan);
        }
            
        if (!empty($kelurahan)) {
            $this->db->where('kelurahan.id_kel', $kelurahan);
        }

        if (!empty($cari)) {
            $this->db->like('nama_bengkel', $cari);
            $this->db->or_like('nama_pemilik', $cari);
            $this->db->or_like('hashtag', $cari);
        }
        return $this->db->count_all_results();   
	}

    public function getBengkelkuPage($limit,$start,$id,$cari,$kategori,$kecamatan,$kelurahan)
    {
        $this->db->select('*');
        $this->db->from('tbl_bengkel');
        $this->db->join('tbl_kategori','tbl_kategori.kode_kategori=tbl_bengkel.kategori_kode');
        $this->db->join('kecamatan','kecamatan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->join('kelurahan','kelurahan.id_kel=tbl_bengkel.kel_id','left');
        $this->db->where('tbl_bengkel.user_id',$id);
        
        if (!empty($kategori)) {
            $this->db->where('tbl_kategori.kode_kategori', $kategori);
        }
            
        if (!empty($kecamatan)) {
            $this->db->where('kecamatan.id_kec', $kecamatan);
        }
            
        if (!empty($kelurahan)) {
            $this->db->where('kelurahan.id_kel', $kelurahan);
        }

        if (!empty($cari)) {
            $this->db->like('nama_bengkel', $cari);
            $this->db->or_like('nama_pemilik', $cari);
            $this->db->or_like('hashtag', $cari);
        }

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;        
    }

    public function countBengkelkuPage($id,$cari,$kategori,$kecamatan,$kelurahan)
    {
        $this->db->select('*');
        $this->db->from('tbl_bengkel');
        $this->db->join('tbl_kategori','tbl_kategori.kode_kategori=tbl_bengkel.kategori_kode');
        $this->db->join('kecamatan','kecamatan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->join('kelurahan','kelurahan.id_kel=tbl_bengkel.kel_id','left');
        $this->db->where('tbl_bengkel.user_id',$id);
        
        if (!empty($kategori)) {
            $this->db->where('tbl_kategori.kode_kategori', $kategori);
        }
            
        if (!empty($kecamatan)) {
            $this->db->where('kecamatan.id_kec', $kecamatan);
        }
            
        if (!empty($kelurahan)) {
            $this->db->where('kelurahan.id_kel', $kelurahan);
        }

        if (!empty($cari)) {
            $this->db->like('nama_bengkel', $cari);
            $this->db->or_like('nama_pemilik', $cari);
            $this->db->or_like('hashtag', $cari);
        }
        return $this->db->count_all_results();   
    }

    public function tambahBengkel($id,$noreg)
    {
        $data=
        [
            'noreg'             => $noreg,
            'nama_bengkel'      => htmlspecialchars($this->input->post('bengkel')),
            'kategori_kode'     => htmlspecialchars($this->input->post('kategori')),
            'nama_pemilik'      => htmlspecialchars($this->input->post('pemilik')),
            'alamat_bengkel'    => htmlspecialchars($this->input->post('alamat')),
            'kec_id'            => htmlspecialchars($this->input->post('kecamatan')),
            'kel_id'            => htmlspecialchars($this->input->post('kelurahan')),
            'peta'              => htmlspecialchars($this->input->post('peta')),
            'no_telp'           => htmlspecialchars($this->input->post('notelp')),
            'hashtag'           => htmlspecialchars($this->input->post('hashtag')),
            'user_id'           => $id
        ];

        $this->db->insert('tbl_bengkel',$data);
    }

    public function ubahBengkel($noreg)
    {
        $data=
        [
            'nama_bengkel'      => htmlspecialchars($this->input->post('bengkel')),
            'kategori_kode'     => htmlspecialchars($this->input->post('kategori')),
            'nama_pemilik'      => htmlspecialchars($this->input->post('pemilik')),
            'hashtag'           => htmlspecialchars($this->input->post('hashtag')),
            'alamat_bengkel'    => htmlspecialchars($this->input->post('alamat')),
            'kec_id'            => htmlspecialchars($this->input->post('kecamatan')),
            'kel_id'            => htmlspecialchars($this->input->post('kelurahan')),
            'peta'              => htmlspecialchars($this->input->post('peta')),
            'no_telp'           => htmlspecialchars($this->input->post('notelp')),
            'hashtag'           => htmlspecialchars($this->input->post('hashtag'))
        ];

        $this->db->where('tbl_bengkel.noreg',$noreg);
        $this->db->update('tbl_bengkel',$data);
    }

    public function ubahBengkel3($noreg)
    {
        $data=
        [
            'alamat_bengkel'    => htmlspecialchars($this->input->post('alamat')),
            'kec_id'            => htmlspecialchars($this->input->post('kecamatan')),
            'kel_id'            => htmlspecialchars($this->input->post('kelurahan')),
            'peta'              => htmlspecialchars($this->input->post('peta')),
            'no_telp'           => htmlspecialchars($this->input->post('notelp')),
        ];

        $this->db->where('tbl_bengkel.noreg',$noreg);
        $this->db->update('tbl_bengkel',$data);
    }

    public function getBengkelByNoreg($noreg)
    {
        $this->db->select('*');
        $this->db->from('tbl_bengkel');
        $this->db->join('tbl_kategori','tbl_kategori.kode_kategori=tbl_bengkel.kategori_kode','left');
        $this->db->join('kecamatan','kecamatan.id_kec=tbl_bengkel.kec_id','left');
        $this->db->join('kelurahan','kelurahan.id_kel=tbl_bengkel.kel_id','left');
        $this->db->where('tbl_bengkel.noreg',$noreg);
        return $this->db->get()->row_array();
        // return $this->db->get_where('tbl_bengkel',['noreg'=>$noreg])->row_array();
    }

    public function jmlRodaDua()
    {
        return $this->db->get_where('tbl_bengkel',['kategori_kode'=>'R2'])->num_rows();
    }

    public function jmlRodaEmpat()
    {
        return $this->db->get_where('tbl_bengkel',['kategori_kode'=>'R4P'])->num_rows();
    }

    public function hapusBengkel($noreg)
    {
        $this->db->where('tbl_bengkel.noreg',$noreg);
        $this->db->delete('tbl_bengkel');
    }






} // END CLASS