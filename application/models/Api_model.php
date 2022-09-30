<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
  private $tableUser = 'tbl_user';
  private $tableKecamatan = 'kecamatan';
  private $tableKelurahan = 'kelurahan';
  private $tableKategori = 'tbl_kategori';
  private $tableBengkel = 'tbl_bengkel';
  private $tableFoto = 'tbl_foto';
  private $tableOperasional = 'tbl_operasional';
  private $tablePelayanan = 'tbl_pelayanan';
  private $tableLayananBengkel = 'tbl_layananbengkel';
  private $tableTagar = 'tbl_tagar';
  private $tableTagarbengkel = 'tbl_tagarbengkel';

  private $hari = [
    'MINGGU',
    'SENIN',
    'SELASA',
    'RABU',
    'KAMIS',
    'JUMAT',
    'SABTU',
  ];

  function login($data)
  {
    $username = !empty($data['username']) ? $data['username'] : '';
    $password = !empty($data['password']) ? $data['password'] : '';

    $user = $this->_getUserWithUsername($username);

    if (!$user) {
      return response(false, 'User tidak ditemukan.');
    }

    if (!$user->is_active) {
      return response(false, 'Akun anda belum diverifikasi. Hubungi admin untuk verifikasi akun.');
    }

    if (!password_verify($password, $user->password)) {
      return response(false, 'Username atau password salah.');
    }

    unset($user->password);

    return response(true, '', $user);
  }

  function register($data)
  {
    $username = !empty($data['username']) ? $data['username'] : '';
    $password = !empty($data['password']) ? $data['password'] : '';
    $namaLengkap = !empty($data['namaLengkap']) ? $data['namaLengkap'] : '';

    if (empty($username)) {
      return response(false, 'Harap isikan Username.');
    }
    if (empty($password)) {
      return response(false, 'Harap isikan Password.');
    }
    if (empty($namaLengkap)) {
      return response(false, 'Harap isikan Nama lengkap.');
    }

    $user = $this->_getUserWithUsername($username);

    if ($user) {
      return response(false, 'Username ini sudah digunakan.');
    }

    $data = [
      'nama_lengkap'   => htmlspecialchars($namaLengkap),
      'username'     => htmlspecialchars($username),
      'password'     => password_hash(htmlspecialchars($password), PASSWORD_DEFAULT),
      'role_id'     => 3,
      'is_active'    => 0,
    ];

    $q = $this->db->insert($this->tableUser, $data);

    if ($q) {
      return response(true, 'Registrasi berhasil. Silahkan hubungi admin untuk verifikasi akun.');
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function _getUserWithUsername($username)
  {
    $this->db->from($this->tableUser);
    $this->db->where('username', $username);
    return $this->db->get()->row();
  }

  function getKategori($id)
  {
    $this->db->from($this->tableKategori);

    if (!empty($id)) {
      $this->db->where('id_kategori', $id);
    }

    $q = $this->db->get();

    if ($q) {
      $data = empty($id) ? $q->result() : $q->row();

      foreach ($data as $d) {
        $this->_appendImageToKategori($d);
      }

      return response(true, '', $data);
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function _appendImageToKategori(&$kategori)
  {
    $kategori->image = base_url("assets/img/{$kategori->kode_kategori}.png");
  }

  function getKecamatan($id)
  {
    $this->db->from($this->tableKecamatan);

    if (!empty($id)) {
      $this->db->where('id_kec', $id);
    }

    $this->db->order_by('nama_kec');
    $q = $this->db->get();

    if ($q) {
      $data = empty($id) ? $q->result() : $q->row();
      return response(true, '', $data);
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function getKelurahan($id)
  {
    $this->db->from($this->tableKelurahan);

    if (!empty($id)) {
      $this->db->where('id_kel', $id);
    }

    $this->db->order_by('nama_kel');
    $q = $this->db->get();

    if ($q) {
      $data = empty($id) ? $q->result() : $q->row();
      return response(true, '', $data);
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function getPelayanan($id)
  {
    $this->db->from($this->tablePelayanan);

    if (!empty($id)) {
      $this->db->where('id_ply', $id);
    }

    $this->db->order_by('nama_ply');

    $q = $this->db->get();

    if ($q) {
      $data = empty($id) ? $q->result() : $q->row();
      return response(true, '', $data);
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function getKelurahanByKecamatan($id_kec)
  {
    if (empty($id_kec)) {
      return response(false, 'Harap masukkan id kecamatan');
    }

    $this->db->from($this->tableKelurahan);
    $this->db->where('id_kec', $id_kec);

    $q = $this->db->get();

    if ($q) {
      return response(true, '', $q->result());
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function getBengkel($id, $filters)
  {
    $this->db->select('bengkel.*');
    $this->db->from("{$this->tableBengkel} bengkel");

    if (!empty($id)) {
      $this->db->where('id_bengkel', $id);
    } else {
      $fSearch = !empty($filters['search']) ?  $filters['search'] : null;
      $fKategori = !empty($filters['kategori']) ?  $filters['kategori'] : null;
      $fKecamatan = !empty($filters['kecamatan']) ?  $filters['kecamatan'] : null;
      $fKelurahan = !empty($filters['kelurahan']) ?  $filters['kelurahan'] : null;
      $fUser = !empty($filters['user']) ?  $filters['user'] : null;

      if (!empty($fSearch)) {
        $split = explode(' ', $fSearch);
        $regex = join('|', $split);

        $this->db->join("{$this->tableLayananBengkel} lb", 'bengkel.noreg = lb.noreg', 'left');
        $this->db->join("{$this->tablePelayanan} ply", 'lb.ply_id = ply.id_ply', 'left');

        $this->db->join("{$this->tableTagarbengkel} tb", 'bengkel.noreg = tb.noreg', 'left');
        $this->db->join("{$this->tableTagar} tgr", 'tb.id_tagar = tgr.id_tagar', 'left');

        $this->db->where("bengkel.nama_bengkel REGEXP '$regex' or tgr.tagar REGEXP '$regex' or ply.nama_ply REGEXP '$regex'");
      }
      if (!empty($fKategori)) {
        $this->db->where('kategori_kode', $fKategori);
      }
      if (!empty($fKecamatan)) {
        $this->db->where('kec_id', $fKecamatan);
      }
      if (!empty($fKelurahan)) {
        $this->db->where('kel_id', $fKelurahan);
      }
      if (!empty($fUser)) {
        $this->db->where('user_id', $fUser);
      }
    }

    $this->db->group_by('bengkel.id_bengkel');
    $q = $this->db->get();

    if ($q) {
      $data = empty($id) ? $q->result() : $q->row();

      if (empty($id)) {
        foreach ($data as $d) {
          $this->_appendBengkelDetails($d);
        }
      } else {
        $this->_appendBengkelDetails($data);
      }

      return response(true, '', $data);
    } else {
      return response(false, $this->db->error()['message']);
    }
  }

  function _appendBengkelDetails(&$bengkel)
  {
    if (empty($bengkel)) {
      return;
    }

    $this->db->from($this->tableOperasional);
    $this->db->where('noreg', $bengkel->noreg);
    $bengkel->operasional = $this->db->get()->result();

    $this->db->select("{$this->tablePelayanan}.*");
    $this->db->from($this->tableLayananBengkel);
    $this->db->where('noreg', $bengkel->noreg);
    $this->db->join($this->tablePelayanan, "{$this->tableLayananBengkel}.ply_id = {$this->tablePelayanan}.id_ply");
    $bengkel->pelayanan = $this->db->get()->result();

    $this->db->select("{$this->tableTagar}.*");
    $this->db->from($this->tableTagarbengkel);
    $this->db->where('noreg', $bengkel->noreg);
    $this->db->join($this->tableTagar, "{$this->tableTagarbengkel}.id_tagar = {$this->tableTagar}.id_tagar");
    $bengkel->tagar = $this->db->get()->result();

    $this->db->from($this->tableKategori);
    $this->db->where('kode_kategori', $bengkel->kategori_kode);
    $kategori = $this->db->get()->row();
    $this->_appendImageToKategori($kategori);
    $bengkel->kategori = $kategori;

    $this->db->from($this->tableKecamatan);
    $this->db->where('id_kec', $bengkel->kec_id);
    $bengkel->kecamatan = $this->db->get()->row();

    $this->db->from($this->tableKelurahan);
    $this->db->where('id_kel', $bengkel->kel_id);
    $bengkel->kelurahan = $this->db->get()->row();

    $path = base_url('uploads/');
    $this->db->select("id_foto, bengkel_kode, concat('$path', nama_file) as nama_file, aktif");
    $this->db->from($this->tableFoto);
    $this->db->where('bengkel_kode', $bengkel->noreg);
    $bengkel->foto = $this->db->get()->result();

    $this->db->from($this->tableOperasional);
    $this->db->where('noreg', $bengkel->noreg);
    $this->db->where('hari', $this->hari[date('w')]);
    $this->db->where('jam_start <= CURRENT_TIME()', null, false);
    $this->db->where('jam_stop >= CURRENT_TIME()', null, false);
    $bengkel->buka = $this->db->count_all_results() > 0;
  }

  function addBengkel($data)
  {
    $noreg = $this->_generateNoReg();
    if (empty($noreg)) {
      return response(false, 'Tidak dapat generate No Reg, silahkan coba lagi');
    }
    $data['noreg'] = $noreg;

    $hashtag = $data['hashtag'];
    $layanan = $data['layanan'];
    $operasional = json_decode($data['operasional']);
    unset($data['hashtag']);
    unset($data['layanan']);
    unset($data['operasional']);

    $this->db->trans_start();

    // Bengkel
    $this->db->insert($this->tableBengkel, $data);
    $id = $this->db->insert_id();

    // Tagar
    $tags = explode(' ', trim(str_replace('#', '', $hashtag)));
    foreach ($tags as $tag) {
      $tagar = $this->_getTagarByName("#$tag");
      $dataTagarBengkel = [
        'id_tagar' => empty($tagar) ? $this->_addTagar($tag) : $tagar->id_tagar,
        'noreg' => $noreg,
      ];

      $this->db->insert($this->tableTagarbengkel, $dataTagarBengkel);
    }

    // Layanan
    $dataLayanan = [];
    foreach ($layanan as $e) {
      $dataLayanan[] = [
        'noreg' => $noreg,
        'ply_id' => $e,
      ];
    }
    $this->db->insert_batch($this->tableLayananBengkel, $dataLayanan);

    // Operasional
    foreach ($operasional as $e) {
      $e->noreg = $noreg;
    }
    $this->db->insert_batch($this->tableOperasional, $operasional);

    // Foto
    $uploadFoto = $this->_uploadFoto($id);
    if ($uploadFoto['success']) {
      foreach ($uploadFoto['data'] as $foto) {
        $this->db->insert($this->tableFoto, [
          'bengkel_kode' => $noreg,
          'nama_file' => $foto['data']['orig_name'],
          'aktif' => 1,
        ]);
      }
    } else {
      return response(false, $uploadFoto['message']);
    }


    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      return response(false, $this->db->error()['message']);
    } else {
      return $this->getBengkel($id, null);
      // return response(true, $data);
    }
  }

  function _generateNoReg()
  {
    for ($i = 0; $i < 10; $i++) {
      $randomString = 'R-' . date('ymd') . '.' . strtoupper(random_string('alpha', 4));

      if ($this->_isNoregAvailable($randomString)) {
        return $randomString;
      }
    }

    return null;
  }

  function _isNoregAvailable($noreg)
  {
    return $this->db
      ->from($this->tableBengkel)
      ->where('noreg', $noreg)
      ->count_all_results() <= 0;
  }

  function _getTagarByName($tagar)
  {
    $this->db->from($this->tableTagar);
    $this->db->where('tagar', $tagar);
    return $this->db->get()->row();
  }

  function _addTagar($tagar)
  {
    $this->db->insert($this->tableTagar, ['tagar' => "#$tagar"]);
    return $this->db->insert_id();
  }

  function _uploadFoto($idBengkel)
  {
    $result['success'] = true;
    $result['message'] = '';

    $key = 'foto_add';
    $count = count($_FILES[$key]['name']);

    for ($i = 0; $i < $count; $i++) {
      if (!empty($_FILES[$key]['name'][$i])) {
        $_FILES['f']['name']      = $_FILES[$key]['name'][$i];
        $_FILES['f']['type']      = $_FILES[$key]['type'][$i];
        $_FILES['f']['tmp_name']  = $_FILES[$key]['tmp_name'][$i];
        $_FILES['f']['error']     = $_FILES[$key]['error'][$i];
        $_FILES['f']['size']      = $_FILES[$key]['size'][$i];

        $config['upload_path']    = './uploads/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
        $config['max_size']       = 2048;
        $config['max_width']      = 3200;
        $config['max_height']     = 2400;
        $config['overwrite']      = true;
        $config['file_name']      = "{$idBengkel}_" . uniqid();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('f')) {
          $out[$i]['data'] = $this->upload->data();
          $out[$i]['success'] = false;
          $out[$i]['message'] = strip_tags($this->upload->display_errors());

          $result['success'] = false;
          $result['message'] = $out[$i]['message'] . ' ' . $_FILES['f']['type'];
          break;
        } else {
          $out[$i]['data'] = $this->upload->data();
          $out[$i]['success'] = true;
          $out[$i]['message'] = '';
        }
      }
    }

    if (!$result['success']) {
      foreach ($out as $o) {
        if ($o['success']) {
          unlink('./uploads/' . $o['data']['orig_name']);
        }
      }
    }

    $result['data'] = $out;

    return $result;
  }

  function deleteBengkel($id)
  {
    $bengkel = $this->_getBengkelById($id);

    if ($bengkel) {
      $namaBengkel = $bengkel->nama_bengkel;
      $noreg = $bengkel->noreg;

      $this->db->trans_start();

      $this->_deleteFotoByNoreg($noreg);
      $this->_deleteLayananBengkelByNoreg($noreg);
      $this->_deleteOperasionalByNoreg($noreg);
      $this->_deleteTagarBengkelByNoreg($noreg);

      $this->db
        ->where('id_bengkel', $id)
        ->delete(
          $this->tableBengkel
        );

      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
        return response(false, $this->db->error()['message']);
      } else {
        return response(true, "Bengkel '$namaBengkel' dengan kode $noreg berhasil dihapus");
      }
    } else {
      return response(false, 'Bengkel tidak ditemukan');
    }
  }

  function _getBengkelById($id)
  {
    return $this->db
      ->from($this->tableBengkel)
      ->where('id_bengkel', $id)
      ->get()
      ->row();
  }

  function _deleteFotoByNoreg($noreg)
  {
    $fotoAll = $this->db
      ->from($this->tableFoto)
      ->where('bengkel_kode', $noreg)
      ->get()
      ->result();

    $q = $this->db
      ->where('bengkel_kode', $noreg)
      ->delete(
        $this->tableFoto
      );

    if ($q) {
      foreach ($fotoAll as $foto) {
        unlink('./uploads/' . $foto->nama_file);
      }
    }
  }

  function _deleteLayananBengkelByNoreg($noreg)
  {
    $this->db
      ->where('noreg', $noreg)
      ->delete(
        $this->tableLayananBengkel
      );
  }

  function _deleteOperasionalByNoreg($noreg)
  {
    $this->db
      ->where('noreg', $noreg)
      ->delete(
        $this->tableOperasional
      );
  }

  function _deleteTagarBengkelByNoreg($noreg)
  {
    $this->db
      ->where('noreg', $noreg)
      ->delete(
        $this->tableTagarbengkel
      );
  }
}
