<?php

class Pengaturan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model','profil');
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

    public function profil()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('pengaturan/profil'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count'] 		= $this->profil->countProfilPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'pengaturan/profil',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Profil');
        $data['profil']     = $this->profil->getProfilPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='pengaturan/profil',$data);
    }







}