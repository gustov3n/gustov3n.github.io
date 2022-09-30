<?php

class Administrasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','user');
        $this->load->model('Role_model','role');
        $this->load->model('Module_model','module');
        $this->load->model('Submodule_model','submodule');
        $this->load->model('Akses_model','akses');
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

    public function user()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('administrasi/user'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count'] 		= $this->user->countUserPage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'administrasi/user',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Pengguna');
        $data['user']     = $this->user->getUserPage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);
        $data['role']     = $this->role->getAllRole();

        $this->templates($view_path='administrasi/user',$data);
    }

    public function tambahuser()
    {
        $this->user->tambahUser();
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/user'));
    }

    public function ubahuser($id)
    {
        $this->user->ubahUser($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/user'));
    }

    public function statususer($status,$id)
    {
        $this->user->statusUser($status,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/user'));
    }

    public function resetpassword($id)
    {
        $this->user->resetPassword($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/user'));        
    }

    public function hapususer($id)
    {
        $this->user->hapusUser($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/user'));
    }

    public function role()
    {
        if (isset($_POST['cari_s'])) {
            $data['cari_s'] = $this->input->post('cari_s');
            $this->session->set_userdata('sess_cari', $data['cari_s']);
            redirect(base_url('administrasi/role'));
        }
        else {
            $data['cari_s'] = $this->session->userdata('sess_cari');
        }

        $data['count']      = $this->role->countRolePage($data['cari_s']);
        $data['pagination'] = pagination(base_url().'administrasi/role',$data['count']);
        $this->pagination->initialize($data['pagination']);

        $data['tools']      = tools('Kelola Role/Peran');
        $data['role']     = $this->role->getRolePage($data['pagination']['per_page'],$this->uri->segment(3,0),$data['cari_s']);

        $this->templates($view_path='administrasi/role',$data);
    }

    public function settinghomepage($id)
    {
        $this->role->settingHomePage($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/role'));        
    }

    public function tambahrole()
    {
        $this->role->tambahRole();
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/role'));
    }

    public function ubahrole($id)
    {
        $this->role->ubahRole($id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/role'));
    }

    public function alldata($status,$id)
    {
        $this->role->allData($status,$id);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/role'));
    }

    public function roleset($id)
    {
        if ($id <= 2) {
            redirect(base_url('administrasi/role'));
        }

        // DEV MODE

        $data['role']       = $this->role->getRoleById($id);
        $data['akses']      = $this->akses->getHakAksesByIdRole($id);
        $data['module']     = $this->module->getAllModuleAkses();
        $data['jmlmodule']  = $this->module->countModule();
        $data['tools']      = tools('Kelola Hak Akses Role/Peran "'.$data['role']['role'].'"');

        $this->templates($view_path='administrasi/roleset',$data);
    }

    public function tambahakses($role,$module,$submodule,$url)
    {
        $uri=$this->uri->segment(6).'/'.$this->uri->segment(7);
        $this->akses->tambahAkses($role,$module,$submodule,$uri);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/roleset/'.$role));
    }

    public function hapusakses($role,$module,$submodule,$url)
    {
        $uri=$this->uri->segment(6).'/'.$this->uri->segment(7);
        $this->akses->hapusAkses($role,$module,$submodule,$uri);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/roleset/'.$role));
    }

    public function tambahsubakses($role,$module,$submodule,$url)
    {
        $uri=$this->uri->segment(6).'/'.$this->uri->segment(7);
        $this->akses->tambahSubAkses($role,$module,$submodule,$uri);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/roleset/'.$role));
    }

    public function hapussubakses($role,$module,$submodule,$url)
    {
        $uri=$this->uri->segment(6).'/'.$this->uri->segment(7);
        $this->akses->hapusSubAkses($role,$module,$submodule,$uri);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/roleset/'.$role));
    }

    public function tambahrolemodule($role,$module)
    {
        $this->akses->tambahRoleModule($role,$module);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/roleset/'.$role));
    }

    public function hapusrolemodule($role,$module)
    {
        $this->akses->hapusRoleModule($role,$module);
        $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
            Berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ');
        redirect(base_url('administrasi/roleset/'.$role));
    }









}