<?php 
  $role       = $this->session->userdata('role_id');
  $username   = $this->session->userdata('username');
  $home       = $this->session->userdata('default_page');
  
  $this->db->select('*');
  $this->db->from('role_module');
  $this->db->join('sys_module','sys_module.id_module=role_module.module_id');
  $this->db->where('role_module.role_id',$role);
  $this->db->where('sys_module.status_module',1);
  // $this->db->order_by('role_module.sort','ASC');
  $this->db->order_by('sys_module.sort','ASC');
  $m_akses      = $this->db->get()->result_array();

  // $unverified   = $this->db->get_where('tbl_rekaman',['status_verifikasi'=>0])->num_rows();
  // $unpublished  = $this->db->get_where('tbl_rekaman',['status_publikasi'=>0])->num_rows();
  // $notif        = $unverified+$unpublished;
?>
  <aside style="background-color:#B22222;" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="background-color:#B22222;" href="<?=base_url();?>" class="brand-link border-bottom border-light">
      <img src="<?=base_url('assets/img/logo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">SIBOS</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom border-light">
        <div class="image">
          <img src="<?=base_url('assets/img/user.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-light"><?=$this->session->userdata('nama_lengkap');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php foreach ($m_akses as $module): ?>
          <li class="nav-item <?php if($tools['uri1'] == $module['url_module']){echo 'menu-open';} ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas <?=$module['icon_module'];?>"></i>
              <p>
                <?=$module['title_module'];?>
                <i class="fas fa-angle-left right"></i>
                <?php if ($module['url_module']=='aktivitas' && $notif!=0): ?>
                  <span class="badge badge-danger right"><?=$unpublished+$unverified;?></span>
                <?php endif ?>
              </p>
            </a>
            <?php 
              $this->db->select('*');
              $this->db->from('role_submodule');
              $this->db->join('sys_submodule','sys_submodule.id_submodule=role_submodule.submodule_id');
              $this->db->where('role_submodule.role_id',$role);
              $this->db->where('role_submodule.module_id',$module['id_module']);
              $this->db->where('sys_submodule.status_submodule',1);
              $sm_akses      = $this->db->get()->result_array();

              $aktif      = $this->db->get_where('sys_submodule',['url_submodule'=>$tools['url']])->row_array();
            ?>
            <?php foreach ($sm_akses as $submodule): ?>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url($submodule['url_submodule']);?>" class="nav-link <?php if($aktif['parent'] == $submodule['id_submodule']){echo 'active';} ?>">
                  <!-- <a href="<?=base_url($submodule['url_submodule']);?>" class="nav-link <?php if($tools['url'] == $submodule['url_submodule']){echo 'active';} ?>"> -->
                    <i class="far fa-circle nav-icon"></i>
                    <p><?=$submodule['title_submodule'];?>
<!--                     <?php if ($submodule['url_submodule']=='aktivitas/verifikasi'): ?>
                      <span class="badge badge-danger right"><?=$unpublished;?></span>
                      <span class="badge badge-danger right"><?=$unverified;?></span>
                    <?php endif ?> -->
                    </p>
                  </a>
                </li>
              </ul>
            <?php endforeach ?>
          </li>
            
          <?php endforeach ?>
          <li class="nav-item">
            <a href="<?=base_url('auth/logout');?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div style="background-color:#FFF8CD;" class="content-wrapper">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-fw fa-folder-open"></i> <?=$tools['title'];?></h1>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid text-xs">