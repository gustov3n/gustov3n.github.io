<?php

function is_logged_in()
{
    $ci =& get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }else{
        $role       = $ci->session->userdata['role_id'];
        $module     = $ci->uri->segment(1);
        $submodule  = $ci->uri->segment(2);
        $url        = $module.'/'.$submodule;

        $akses      = $ci->db->get_where('user_akses',['role_id'=>$role,'url'=>$url]);

        if ($akses->num_rows()==0) {
            redirect('auth/blocked');
        }
    }
}

if (!function_exists('bulan')) {
    function bulan($bulan){
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('tanggal')) {
    function tanggal($tanggal) {
        $a = explode('-',$tanggal);
        $tanggal = $a['2']." ".bulan($a['1'])." ".$a['0'];
        return $tanggal;
    }
}

if (!function_exists('tools')) {
    function tools($title)
    {
        $ci =& get_instance();
        $userlogin  = $ci->db->get_where('tbl_user',['username' => $ci->session->userdata('username')])->row_array();
        $role       = $ci->db->get_where('tbl_role',['id_role' => $ci->session->userdata('role_id')])->row_array();

        $tools=
        [
            'title'             => "$title",
            'input'             => 'form-control form-control-sm',
            'btn-success'       => 'btn btn-sm btn-success',
            'btn-primary'       => 'btn btn-sm btn-primary',
            'btn-secondary'     => 'btn btn-sm btn-secondary',
            'btn-dark'          => 'btn btn-sm btn-dark',
            'btn-warning'       => 'btn btn-sm btn-warning',
            'btn-danger'        => 'btn btn-sm btn-danger',
            'btn-info'          => 'btn btn-sm btn-info',
            'btn-light'         => 'btn btn-sm btn-light',
            'btn-white'         => 'btn btn-sm btn-white',
            1                   => $ci->uri->segment(1),
            2                   => $ci->uri->segment(2),
            3                   => $ci->uri->segment(3),
            4                   => $ci->uri->segment(4),
            'iduserlogin'       => $userlogin['id_user'],
            'role_data'         => $role['all_data'],
            'uri1'              => $ci->uri->segment(1),
            'uri2'              => $ci->uri->segment(2),
            'url'               => $ci->uri->segment(1).'/'.$ci->uri->segment(2),
            // 'iduserlogin'       => $userlogin['id_user'],
            // 'namauserlogin'     => $userlogin['nama_lengkap'],
            // 'idgudanguserlogin' => $userlogin['id_gudang']
        ];

        return $tools;
    }
}

if (!function_exists('pagination')) {
    function pagination($baseurl,$totalrow)
    {
        return $pagination = [

            'base_url'          => $baseurl,
            'total_rows'        => $totalrow,
            'per_page'          => 10,
            'uri_segment'       => 3,
            'num_links'         => 2,
            'full_tag_open'     => '<ul class="pagination pagination-sm">',
            'full_tag_close'    => '</ul>',
            'first_link'        => '<<',
            'first_tag_open'    => '<li class="page-item firstlink"><span class="page-link">',
            'first_tag_close'   => '</span></li>',
            'last_link'         => '>>',
            'last_tag_open'     => '<li class="page-item lastlink"><span class="page-link">',
            'last_tag_close'    => '</span></li>',
            'next_link'         => '>',
            'next_tag_open'     => '<li class="page-item nextlink"><span class="page-link">',
            'next_tag_close'    => '</span></li>',
            'prev_link'         => '<',
            'prev_tag_open'     => '<li class="page-item prevlink"><span class="page-link">',
            'prev_tag_close'    => '</span></li>',
            'cur_tag_open'      => '<li class="page-item curlink active"><span class="page-link bg-info border-info">',
            'cur_tag_close'     => '</span></li>',
            'num_tag_open'      => '<li class="page-item curlink"><span class="page-link">',
            'num_tag_close'     => '</span></li>'
        ];
    }
}

if (!function_exists('halaman')) {
    function halaman($count,$perpage,$page,$data1)
    {
      $jmlhalaman         = ceil($count/$perpage);
      $halaman            = $perpage+$page;
      $lastpage           = $halaman-$count;
      $jmldatalastpage    = $halaman-$lastpage;

      if ($page=='' && $count<$perpage && $count>0) {
        return "Menampilkan 1 - $count dari $count";
      }elseif ($count<1) {
      // kosong
      }elseif ($halaman>$count) {
        return "Menampilkan $data1 - $jmldatalastpage dari $count";
      }else{
        return "Menampilkan $data1 - $halaman dari $count";
      }
    }
}

if (!function_exists('getmodule')) {
    function getmodule()
    {
        $ci =& get_instance();
        return $ci->db->get('sys_module')->result_array();
    }
}

if (!function_exists('getsubmodule')) {
    function getsubmodule($id)
    {
        $ci =& get_instance();
        return $ci->db->get_where('sys_submodule',['module_id'=>$id])->result_array();
    }
}