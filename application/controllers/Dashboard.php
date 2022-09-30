<?php

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Module_model','module');
        $this->load->model('Submodule_model','submodule');
        $this->load->model('Kategori_model','kategori');
        $this->load->model('Bengkel_model','bengkel');
        $this->load->model('Daerah_model','daerah');
        $this->load->model('Pelayanan_model','pelayanan');
        $this->load->model('Layanan_model','layanan');
        $this->load->model('Foto_model','foto');
        $this->load->model('Operasional_model','op');
        // is_logged_in();
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

    public function index()
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
            redirect(base_url('dashboard/index'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
            $data['kategori_s'] = $this->session->userdata('sess_kategori');
            $data['kecamatan_s'] = $this->session->userdata('sess_kecamatan');
            $data['kelurahan_s'] = $this->session->userdata('sess_kelurahan');
        }

        $data['count'] 		= $this->bengkel->countBengkelPage($data['cari_s'],$data['kategori_s'],$data['kecamatan_s'],$data['kelurahan_s']);
        $data['pagination'] = pagination(base_url().'dashboard/index',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['r2'] 		= $this->bengkel->jmlRodaDua();
        $data['r4p'] 		= $this->bengkel->jmlRodaEmpat();
        $data['kategori']   = $this->kategori->getAllKategori();
        $data['pelayanan']  = $this->pelayanan->getPelayanan();
        $data['bengkel']    = $this->bengkel->getBengkelPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s'],$data['kategori_s'],$data['kecamatan_s'],$data['kelurahan_s']);

        $this->load->view('dashboard/index',$data);
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



}