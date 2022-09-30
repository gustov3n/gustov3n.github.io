<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses_model extends CI_Model{

	public function getHakAksesByIdRole($id)
	{
		return $this->db->get_where('user_akses',['role_id'=>$id])->result_array();
	}

    public function getAksesMenu($id,$url)
    {
    	$this->db->select('*');
    	$this->db->from('user_akses');
    	$this->db->join('role_submodule','role_submodule.role_id=user_akses.role_id');
    	$this->db->join('role_module','role_module.role_id=user_akses.role_id');
    	$this->db->where('user_akses.role_id',$id);
    	$this->db->where('user_akses.url',$url);
        return $this->db->get()->num_rows();
        // return $this->db->get_where('user_akses',['role_id'=>$id,'url'=>$url])->num_rows();
    }

    public function getAksesFungsi($id,$url)
    {
        return $this->db->get_where('user_akses',['role_id'=>$id,'url'=>$url])->num_rows();
    }

    public function cekAksesFitur($role,$parent)
    {
    	// $this->db->select('*');
    	// $this->db->from('role_module');
    	// $this->db->join('role_submodule','role_submodule.role_id=role_module.role_id');
    	// $this->db->join('sys_submodule','sys_submodule.id_submodule=role_submodule.submodule_id');
    	// $this->db->where('role_module.role_id',$role);
    	// $this->db->where('role_submodule.submodule_id',$parent);
    	// return $this->db->get()->num_rows();
    	return $this->db->get_where('role_submodule',['role_id'=>$role,'submodule_id'=>$parent])->num_rows();
    }

    public function tambahAkses($role,$module,$submodule,$url)
    {
    	$this->db->insert('role_submodule',['role_id'=>$role,'module_id'=>$module,'submodule_id'=>$submodule]);
    	$this->db->insert('user_akses',['role_id'=>$role,'module_id'=>$module,'url'=>$url]);
    }

    public function tambahSubAkses($role,$module,$submodule,$url)
    {
    	$this->db->insert('role_submodule',['role_id'=>$role,'module_id'=>$module,'submodule_id'=>$submodule]);
    	$this->db->insert('user_akses',['role_id'=>$role,'module_id'=>$module,'url'=>$url]);
    }

    public function hapusAkses($role,$module,$submodule,$url)
    {
    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->where('submodule_id',$submodule);
    	$this->db->delete('role_submodule');

    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->where('url',$url);
    	$this->db->delete('user_akses');
    }

    public function hapusSubAkses($role,$module,$submodule,$url)
    {
    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->where('submodule_id',$submodule);
    	$this->db->delete('role_submodule');

    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->where('url',$url);
    	$this->db->delete('user_akses');
    }

    public function cekAksesRoleModule($role,$module)
    {
    	return $this->db->get_where('role_module',['role_id'=>$role,'module_id'=>$module])->num_rows();
    }

    public function tambahRoleModule($role,$module)
    {
    	$this->db->insert('role_module',['role_id'=>$role,'module_id'=>$module]);
    }

    public function hapusRoleModule($role,$module)
    {
    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->delete('role_module');

    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->delete('role_submodule');

    	$this->db->where('role_id',$role);
    	$this->db->where('module_id',$module);
    	$this->db->delete('user_akses');
    }

    public function getRoleById($id)
    {
    	$this->db->select('*');
    	$this->db->from('sys_submodule');
    	$this->db->join('user_akses','user_akses.url=sys_submodule.url_submodule');
    	$this->db->where('sys_submodule.status_submodule',1);
    	$this->db->where('user_akses.role_id',$id);
    	return $this->db->get()->result_array();
    }






} // END CLASS