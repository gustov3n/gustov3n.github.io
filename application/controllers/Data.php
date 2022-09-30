<?php

class Data extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model','kategori');
        $this->load->model('Bengkel_model','bengkel');
        $this->load->model('Daerah_model','daerah');
        $this->load->model('Pelayanan_model','pelayanan');
        $this->load->model('Layanan_model','layanan');
        $this->load->model('Foto_model','foto');
        is_logged_in();
    }

    public function templates($view_path,$data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view($view_path,$data);
        $this->load->view('templates/footer');  
    }

    public function reset($uri1='',$uri2='',$uri3='')
    {
        if ($uri3=='') {
            $url=$uri1.'/'.$uri2;
        }else{
            $url=$uri1.'/'.$uri2.'/'.$uri3;
        }

        $sesi = 
        [
            'sess_cari',
            'sess_kategori',
            'sess_kecamatan',
            'sess_kelurahan'
        ];
        
        $this->session->unset_userdata($sesi);
        redirect(base_url($url));
    }

    public function bengkel()
    {
        if (isset($_POST['cari_s']) || isset($_POST['kategori_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $data['kategori_s'] = $this->input->post('kategori_s');
            $data['kecamatan_s'] = $this->input->post('kecamatan_s');
            $data['kelurahan_s'] = $this->input->post('kelurahan_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            $this->session->set_userdata('sess_kategori', $data['kategori_s']);
            $this->session->set_userdata('sess_kecamatan', $data['kecamatan_s']);
            $this->session->set_userdata('sess_kelurahan', $data['kelurahan_s']);
            redirect(base_url('data/bengkel'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
            $data['kategori_s'] = $this->session->userdata('sess_kategori');
            $data['kecamatan_s'] = $this->session->userdata('sess_kecamatan');
            $data['kelurahan_s'] = $this->session->userdata('sess_kelurahan');
        }

        $data['count']      = $this->bengkel->countBengkelPage($data['cari_s'],$data['kategori_s'],$data['kecamatan_s'],$data['kelurahan_s']);
        $data['pagination'] = pagination(base_url().'data/bengkel',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Bengkel');
        $data['noreg']      = 'R-'.date('ymd').'.'.random_string('numeric',4);
        $data['bengkel']    = $this->bengkel->getBengkelPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s'],$data['kategori_s'],$data['kecamatan_s'],$data['kelurahan_s']);

        $this->templates($view_path='data/bengkel',$data);
    }

    public function bengkelku()
    {
        if (isset($_POST['cari_s']) || isset($_POST['kategori_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $data['kategori_s'] = $this->input->post('kategori_s');
            $data['kecamatan_s'] = $this->input->post('kecamatan_s');
            $data['kelurahan_s'] = $this->input->post('kelurahan_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            $this->session->set_userdata('sess_kategori', $data['kategori_s']);
            $this->session->set_userdata('sess_kecamatan', $data['kecamatan_s']);
            $this->session->set_userdata('sess_kelurahan', $data['kelurahan_s']);
            redirect(base_url('data/bengkelku'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
            $data['kategori_s'] = $this->session->userdata('sess_kategori');
            $data['kecamatan_s'] = $this->session->userdata('sess_kecamatan');
            $data['kelurahan_s'] = $this->session->userdata('sess_kelurahan');
        }

        $data['tools']      = tools('Kelola Bengkel');
        $data['count']      = $this->bengkel->countBengkelkuPage($data['tools']['iduserlogin'],$data['cari_s'],$data['kategori_s'],$data['kecamatan_s'],$data['kelurahan_s']);
        $data['pagination'] = pagination(base_url().'data/bengkel',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['noreg']      = 'R-'.date('ymd').'.'.random_string('numeric',4);
        $data['bengkel']    = $this->bengkel->getBengkelkuPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['tools']['iduserlogin'],$data['cari_s'],$data['kategori_s'],$data['kecamatan_s'],$data['kelurahan_s']);

        $this->templates($view_path='data/bengkelku',$data);
    }

    public function getdatakec()
    {
        $response   = $this->daerah->getkec(3309, htmlspecialchars($this->input->post('searchTerm')));
        echo json_encode($response);
    }

    public function getdatakel($id_kec)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->daerah->getkel($id_kec, $searchTerm);
        echo json_encode($response);
    }

    public function kelolabengkel($sheet,$noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $data['kategori']   = $this->kategori->getAllKategori();
        $data['bengkel']    = $this->bengkel->getBengkelByNoreg($noreg);
        $data['noreg']      = $noreg;
        $data['sheet']      = $sheet;
        $data['foto']       = $this->foto->getFotoByKode($noreg);
        $data['fotoaktif']  = $this->foto->getFotoAktif($noreg);
        $data['jmlfoto']    = $this->foto->jmlFotoByKode($noreg);
        $data['pelayanan']  = $this->pelayanan->getPelayanan();
        $data['layanan']    = $this->layanan->getLayananByNoreg($noreg);
        $this->templates($view_path='data/kelola-bengkel-'.$sheet,$data);
    }      

    public function kelolabengkelku($sheet,$noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $data['bengkel']    = $this->bengkel->getBengkelByNoreg($noreg);

        $ceknoreg=$this->db->get_where('tbl_bengkel',['noreg'=>$noreg])->row_array();        

        if (!empty($ceknoreg) && $ceknoreg['user_id']!=$data['tools']['iduserlogin']) {
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
                Anda tidak memiliki hak akses.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('data/bengkelku'));
        }
        
        $data['kategori']   = $this->kategori->getAllKategori();
        $data['noreg']      = $noreg;
        $data['sheet']      = $sheet;
        $data['foto']       = $this->foto->getFotoByKode($noreg);
        $data['fotoaktif']  = $this->foto->getFotoAktif($noreg);
        $data['jmlfoto']    = $this->foto->jmlFotoByKode($noreg);
        $data['pelayanan']  = $this->pelayanan->getPelayanan();
        $data['layanan']    = $this->layanan->getLayananByNoreg($noreg);
        $this->templates($view_path='data/kelola-bengkelku-'.$sheet,$data);
    }  

    public function tambahbengkel($noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $data['kategori']   = $this->kategori->getAllKategori();
        $data['bengkel']    = $this->bengkel->getBengkelByNoreg($noreg);
        $data['noreg']      = $noreg;
        $this->templates($view_path='data/tambah-bengkel',$data);
    }

    public function tambahdatabengkel($noreg)
    {
        $this->bengkel->tambahBengkel($noreg);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkel/'.$noreg));
    }

    public function ubahbengkel($noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $cek=$this->db->get_where('tbl_bengkel',['noreg'=>$noreg])->num_rows();
        if ($cek<1) {
	       $this->bengkel->tambahBengkel($data['tools']['iduserlogin'],$noreg);
        }else{
            $this->bengkel->ubahBengkel($noreg);
        }
	    $this->session->set_flashdata('notifikasi','
	        <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
	        Berhasil disimpan.
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
	        </div>
	        ');
	    redirect(base_url('data/kelolabengkel/1/'.$noreg));
    }

    public function ubahbengkelku($noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $cek=$this->db->get_where('tbl_bengkel',['noreg'=>$noreg])->num_rows();
        if ($cek<1) {
           $this->bengkel->tambahBengkel($data['tools']['iduserlogin'],$noreg);
        }else{
            $this->bengkel->ubahBengkel($noreg);
        }
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkelku/1/'.$noreg));
    }

    public function upload($noreg)
    {
        $fileExt = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
        $cek=$this->foto->jmlFotoByKode($noreg);
        $urutan=$cek+1;

        if ($cek < 1) {
            $namafile   = htmlentities($this->input->post('id')).'_'.$urutan.'.'.$fileExt;
            $aktif      = 1;
        }else{
            $namafile   = htmlentities($this->input->post('id')).'_'.$urutan.'.'.$fileExt;
            $aktif      = 0;            
        }

        $config = array(
            'upload_path' => "uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
            'overwrite' => TRUE,
            'max_size' => "512",
            'max_height' => "2400",
            'max_width' => "3200",
            'file_name' => $namafile
        );

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
                Upload Gagal.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('data/kelolabengkel/4/'.$noreg));
        }
        else
        {
            $this->foto->uploadFoto($noreg,$namafile,$aktif);
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
                Berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('data/kelolabengkel/4/'.$noreg));
        }
    }

    public function uploadku($noreg)
    {
        $fileExt = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
        $cek=$this->foto->jmlFotoByKode($noreg);
        $urutan=$cek+1;

        if ($cek < 1) {
            $namafile   = htmlentities($this->input->post('id')).'_'.$urutan.'.'.$fileExt;
            $aktif      = 1;
        }else{
            $namafile   = htmlentities($this->input->post('id')).'_'.$urutan.'.'.$fileExt;
            $aktif      = 0;            
        }

        $config = array(
            'upload_path' => "uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
            'overwrite' => TRUE,
            'max_size' => "512",
            'max_height' => "2400",
            'max_width' => "3200",
            'file_name' => $namafile
        );

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
                Upload Gagal.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('data/kelolabengkelku/4/'.$noreg));
        }
        else
        {
            $this->foto->uploadFoto($noreg,$namafile,$aktif);
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
                Berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('data/kelolabengkelku/4/'.$noreg));
        }
    }

    public function layanan($noreg)
    {
        $data['tools']      = tools('Kelola Jenis Pelayanan');
        $data['pelayanan']    = $this->pelayanan->getPelayanan();
        $data['layanan']    = $this->layanan->getLayananByNoreg($noreg);
        $data['noreg']      = $noreg;

        $this->templates($view_path='data/layanan',$data);
    }

    public function tambahlayananbengkel($noreg,$id)
    {
        $this->layanan->tambahLayananBengkel($noreg,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkel/2/'.$noreg));
    }

    public function hapuslayananbengkel($noreg,$id)
    {
        $this->layanan->hapusLayananBengkel($noreg,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkel/2/'.$noreg));
    }

    public function tambahlayananbengkelku($noreg,$id)
    {
        $this->layanan->tambahLayananBengkel($noreg,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkelku/2/'.$noreg));
    }

    public function hapuslayananbengkelku($noreg,$id)
    {
        $this->layanan->hapusLayananBengkel($noreg,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkelku/2/'.$noreg));
    }

    public function hapusfoto($id,$noreg)
    {
        $this->foto->hapusFoto($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/kelolabengkel/4/'.$noreg));
    }


    public function pelayanan()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('data/pelayanan'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count']      = $this->pelayanan->countPelayananPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'data/pelayanan',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Jenis Pelayanan');
        $data['pelayanan']     = $this->pelayanan->getPelayananPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='data/pelayanan',$data);
    }

    public function tambahpelayanan()
    {
        $this->pelayanan->tambahPelayanan();
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/pelayanan'));
    }

    public function ubahpelayanan($id)
    {
        $this->pelayanan->ubahPelayanan($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/pelayanan'));
    }

    public function hapuspelayanan($id)
    {
        $this->pelayanan->hapusPelayanan($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/pelayanan'));
    }

    public function hapusbengkel($noreg)
    {
        $this->bengkel->hapusBengkel($noreg);
        $this->foto->hapusFotoBengkel($noreg);
        $this->layanan->hapusLayanan($noreg);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('data/pelayanan'));
    }



}