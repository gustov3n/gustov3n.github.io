<?php

class Master extends CI_Controller {
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
        ];
        
        $this->session->unset_userdata($sesi);
        redirect(base_url($url));
    }

    public function kategori()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('master/kategori'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count'] 		= $this->kategori->countKategoriPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'master/kategori',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Kategori');
        $data['kategori']     = $this->kategori->getKategoriPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='master/kategori',$data);
    }

    public function bengkel()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('master/bengkel'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count']      = $this->bengkel->countBengkelPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'master/bengkel',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Bengkel');
        $data['noreg']      = 'R-'.date('ymd').'.'.random_string('numeric',4);
        $data['bengkel']     = $this->bengkel->getBengkelPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='master/bengkel',$data);
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

    // public function kelolabengkel($tahap,$noreg)
    // {
    //     $data['tools']      = tools('Kelola Bengkel');
    //     $data['kategori']   = $this->kategori->getAllKategori();
    //     $data['bengkel']    = $this->bengkel->getBengkelByNoreg($noreg);
    //     $data['noreg']      = $noreg;
    //     if ($tahap==1) {
    //         $this->templates($view_path='master/kelola-bengkel1',$data);
    //     }elseif($tahap==2)
    //         $this->templates($view_path='master/kelola-bengkel2',$data);
    //     else{
    //         $this->templates($view_path='master/kelola-bengkel3',$data);
    //     }
    // }    

    public function kelolabengkel($noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $data['kategori']   = $this->kategori->getAllKategori();
        $data['bengkel']    = $this->bengkel->getBengkelByNoreg($noreg);
        $data['noreg']      = $noreg;
        $data['foto']       = $this->foto->getFotoByKode($noreg);
        $data['fotoaktif']  = $this->foto->getFotoAktif($noreg);
        $data['jmlfoto']    = $this->foto->jmlFotoByKode($noreg);
        $this->templates($view_path='master/kelola-bengkel',$data);
    }      

    public function tambahbengkel($noreg)
    {
        $data['tools']      = tools('Kelola Bengkel');
        $data['kategori']   = $this->kategori->getAllKategori();
        $data['bengkel']    = $this->bengkel->getBengkelByNoreg($noreg);
        $data['noreg']      = $noreg;
        $this->templates($view_path='master/tambah-bengkel',$data);
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
        redirect(base_url('master/kelolabengkel/'.$noreg));
    }

    public function ubahbengkel($tahap,$noreg)
    {
        if ($tahap==2) {
            $this->bengkel->ubahBengkel($noreg);
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
                Berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('master/kelolabengkel/'.$tahap.'/'.$noreg));
        }elseif($tahap==3){
            $this->bengkel->ubahBengkel3($noreg);
            $this->session->set_flashdata('notifikasi','
                <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
                Berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                ');
            redirect(base_url('master/kelolabengkel/'.$tahap.'/'.$noreg));
        }
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
            redirect(base_url('master/kelolabengkel/'.$noreg));
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
            redirect(base_url('master/kelolabengkel/'.$noreg));
        }
    }


    public function layanan($noreg)
    {
        $data['tools']      = tools('Kelola Jenis Pelayanan');
        $data['pelayanan']    = $this->pelayanan->getPelayanan();
        $data['layanan']    = $this->layanan->getLayananByNoreg($noreg);
        $data['noreg']      = $noreg;

        $this->templates($view_path='master/layanan',$data);
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
        redirect(base_url('master/layanan/'.$noreg));
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
        redirect(base_url('master/layanan/'.$noreg));
    }

    public function pelayanan()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('master/pelayanan'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count']      = $this->pelayanan->countPelayananPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'master/pelayanan',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Jenis Pelayanan');
        $data['pelayanan']     = $this->pelayanan->getPelayananPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='master/pelayanan',$data);
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
        redirect(base_url('master/pelayanan'));
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
        redirect(base_url('master/pelayanan'));
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
        redirect(base_url('master/pelayanan'));
    }


}