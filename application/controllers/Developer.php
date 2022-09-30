<?php

class Developer extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Module_model','module');
        $this->load->model('Submodule_model','submodule');
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

    public function index()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('developer/index'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count'] 		= $this->module->countModulePage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'developer/index',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Module');
        $data['module']     = $this->module->getModulePage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='developer/module',$data);
    }

    public function tambahmodule()
    {
        $this->module->tambahModule();
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/index'));
    }

    public function statusmodule($status,$id)
    {
        $this->module->statusModule($status,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/index'));
    }

    public function ubahmodule($id)
    {
        $this->module->ubahModule($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/index'));
    }

    public function hapusmodule($id)
    {
        $this->module->hapusModule($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/index'));
    }

    public function submodule()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('developer/submodule'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count']      = $this->submodule->countSubmodulePage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'developer/submodule',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Submodule');
        $data['module']      = $this->module->getAllModule();
        $data['submodule']     = $this->submodule->getSubmodulePage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='developer/submodule',$data);
    }

    public function tambahsubmodule()
    {
        $this->submodule->tambahsubmodule();
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/submodule'));
    }

    public function ubahsubmodule($id,$param)
    {
        $this->submodule->ubahsubmodule($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/'.$param));
    }

    public function func()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('developer/func'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count']      = $this->submodule->countFuncPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'developer/func',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Function');
        $data['module']      = $this->module->getAllModule();
        $data['menu']       = $this->submodule->getMenu();
        $data['submodule']     = $this->submodule->getFuncPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='developer/func',$data);
    }

    public function tambahfunc()
    {
        $this->submodule->tambahFunc();
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/func'));
    }

    public function hapussubmodule($id,$param)
    {
        $this->submodule->hapusSubmodule($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('developer/'.$param));
    }




}