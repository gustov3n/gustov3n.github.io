<div class="row mb-3">
  <div class="col">
    <a class="btn btn-sm btn-dark" href="<?=base_url('administrasi/role');?>"><i class="fas fa-fw fa-arrow-circle-left text-white-50"></i> Kembali</a>
  </div>
</div>
<div class="row text-sm">
  <?php foreach ($module as $r_mod): ?>

    <?php 
      $kolom = $jmlmodule;
      switch ($kolom) {
        case 1:
          $col=12;
          break;
        case 2:
          $col=6;
          break;
        default:
          $col=3;
          break;
      }
    ?>

    <div class="col-<?=$col;?>">
    <div class="card">
      <div class="card-header">
        <?php 
          $cekaksesmodule=$this->akses->cekAksesRoleModule($tools[3],$r_mod['id_module']);
        ?>
        <?php if (!empty($cekaksesmodule)): ?>
          <a onclick="return confirm('Anda yakin ingin menghapus semua akses pada module ini?')" href="<?=base_url('administrasi/hapusrolemodule/'.$tools[3].'/'.$r_mod['id_module']);?>"><i class="fas fa-fw fa-toggle-on text-teal"></i></a> <?=$r_mod['title_module'];?>
        <?php else: ?>
          <a href="<?=base_url('administrasi/tambahrolemodule/'.$tools[3].'/'.$r_mod['id_module']);?>"><i class="fas fa-fw fa-toggle-off text-secondary"></i></a> <?=$r_mod['title_module'];?>
        <?php endif ?>
      </div>
      <div class="card-body">
        <?php 
          $menu=$this->submodule->getMenuByIdModule($r_mod['id_module']);
          foreach ($menu as $r_menu) {
            ?>
            <div class="row">
              <div class="col">
                <?php 
                  $aksesmenu=$this->akses->getAksesMenu($tools[3],$r_menu['url_submodule']);
                  $fitur=$this->submodule->getFungsiByIdModule($r_menu['id_submodule']);
                ?>
                <?php if (!empty($cekaksesmodule)): ?>
                  <?php if (!empty($aksesmenu)): ?>
                    <i class="fas fa-fw fa-check-circle text-teal"></i><a class="text-teal" href="<?=base_url('administrasi/hapusakses/'.$tools[3].'/'.$r_menu['module_id'].'/'.$r_menu['id_submodule'].'/'.$r_menu['url_submodule']);?>"> <?=$r_menu['title_submodule'];?></a>
                  <?php else: ?>
                    <i class="fas fa-fw fa-minus-circle text-danger"></i><a class="text-danger" href="<?=base_url('administrasi/tambahakses/'.$tools[3].'/'.$r_menu['module_id'].'/'.$r_menu['id_submodule'].'/'.$r_menu['url_submodule']);?>"> <?=$r_menu['title_submodule'];?></a>
                  <?php endif ?>
                <?php else: ?>
                  <i class="fas fa-fw fa-times-circle text-secondary"></i> <?=$r_menu['title_submodule'];?>
                <?php endif ?>

                <?php foreach ($fitur as $r_fitur): ?>
                  <?php 
                    $aksesfitur=$this->akses->getAksesFungsi($tools[3],$r_fitur['url_submodule']);
                    $cekaksesfitur=$this->akses->cekAksesFitur($tools[3],$r_fitur['parent']);
                  ?>
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col">
                      <?php if (empty($cekaksesfitur)): ?>
                        <i class="fas fa-fw fa-times-circle text-secondary"></i> <?=$r_fitur['title_submodule'];?>
                        <?php else: ?>
                          <?php if (!empty($aksesfitur)): ?>
                            <i class="fas fa-fw fa-check-circle text-olive"></i><a class="text-olive" href="<?=base_url('administrasi/hapussubakses/'.$tools[3].'/'.$r_menu['module_id'].'/'.$r_fitur['id_submodule'].'/'.$r_fitur['url_submodule']);?>"> <?=$r_fitur['title_submodule'];?></a>
                          <?php else: ?>
                            <i class="fas fa-fw fa-minus-circle text-danger"></i><a class="text-danger" href="<?=base_url('administrasi/tambahsubakses/'.$tools[3].'/'.$r_menu['module_id'].'/'.$r_fitur['id_submodule'].'/'.$r_fitur['url_submodule']);?>"> <?=$r_fitur['title_submodule'];?></a>
                          <?php endif ?>
                      <?php endif ?>

                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php
          }
         ?>
      </div>
    </div>
    </div>
  <?php endforeach ?>
</div>