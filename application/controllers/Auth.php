<?php

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model','user');
        // is_logged_in();
    }

    public function templates($view_path,$data)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view($view_path,$data);
        $this->load->view('templates/footer');  
    }

    public function reset($uri1,$uri2,$uri3='')
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
        if (!empty($this->session->userdata('username'))) {
            redirect($this->session->userdata('default_page'));
        }else{
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            $data['ok']='OK';

            if ($this->form_validation->run() == false) {
            // redirect(base_url('dashboard'));
                // $this->load->view('auth/logout',$data);
                $this->load->view('auth/login',$data);
            }else{
                $this->_login();
            }
        }
    }

    private function _login()
    {
    	$username 	= htmlspecialchars($this->input->post('username'));
    	$password 	= htmlspecialchars($this->input->post('password'));

    	$user 		= $this->db->get_where('tbl_user',['username'=>$username])->row_array();
    	$role 		= $this->db->get_where('tbl_role',['id_role'=>$user['role_id']])->row_array();

    	if ($user) {
    		if ($user['is_active']==1) {
    			if (password_verify($password,$user['password'])) {
    				$data=[
    					'username' 		=> $user['username'],
    					'role_id' 		=> $user['role_id'],
    					'nama_lengkap' 	=> $user['nama_lengkap'],
                        'default_page'  => $role['default_page']
    				];
    				$this->session->set_userdata($data);
    				redirect($role['default_page']);
    			}else{
		            $this->session->set_flashdata('notifikasi','
		            <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
		                Password salah.
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            ');
		            redirect(base_url('auth'));    				
    			}
    		}else{
	            $this->session->set_flashdata('notifikasi','
	            <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
	                Verifikasi akun.
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            ');
	            redirect(base_url('auth'));    			
    		}
    	}else{
            $this->session->set_flashdata('notifikasi','
            <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
                Username belum terdaftar.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect(base_url('auth'));
    	}

    }

    public function register()
    {
        $this->load->view('auth/registrasi');
    }

    public function registrasi()
    {
        $cekusername=$this->user->cekUser(htmlspecialchars($this->input->post('username')));
        if ($cekusername>0) {
            $this->session->set_flashdata('notifikasi','
            <div class="alert alert-danger border border-0 alert-dismissible fade show" role="alert">
                Username sudah ada!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect(base_url('auth/register'));            
        }else{
            $this->user->registrasi();
            $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success bg-teal border border-0 alert-dismissible fade show" role="alert">
                Pendaftaran berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            redirect(base_url('auth'));
        }

    }

    public function logout()
    {
    	// $this->session->unset_userdata('username');
    	// $this->session->unset_userdata('role_id');
            $this->session->sess_destroy();
            $this->session->set_flashdata('notifikasi','
            <div class="alert alert-success border border-0 alert-dismissible fade show" role="alert">
                Berhasil Logout.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
        redirect(base_url('dashboard'));

    }

    public function blocked()
    {
    	$this->load->view('auth/blocked');
    }


} // END CLASS
