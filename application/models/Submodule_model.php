<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submodule_model extends CI_Model{

	public function getSubmodulePage($limit,$start,$cari)
	{
        $this->db->select('*');
        $this->db->from('sys_submodule');
        $this->db->join('sys_module','sys_module.id_module=sys_submodule.module_id','left');

        if (!empty($cari)) {
            $this->db->like('sys_submodule.title_submodule', $cari);
        }

        $this->db->where('sys_submodule.status_submodule',1);

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countSubmodulePage($cari)
	{
        $this->db->select('*');
        $this->db->from('sys_submodule');
        $this->db->join('sys_module','sys_module.id_module=sys_submodule.module_id','left');
        if (!empty($cari)) {
            $this->db->like('sys_submodule.title_submodule', $cari);
        }
        $this->db->where('sys_submodule.status_submodule',1);
        return $this->db->count_all_results();   
	}

    public function getFuncPage($limit,$start,$cari)
    {
        $this->db->select('*');
        $this->db->from('sys_submodule');
        $this->db->join('sys_module','sys_module.id_module=sys_submodule.module_id','left');

        if (!empty($cari)) {
            $this->db->like('sys_submodule.title_submodule', $cari);
        }

        $this->db->where('sys_submodule.status_submodule',0);

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;        
    }

    public function countFuncPage($cari)
    {
        $this->db->select('*');
        $this->db->from('sys_submodule');
        $this->db->join('sys_module','sys_module.id_module=sys_submodule.module_id','left');
        if (!empty($cari)) {
            $this->db->like('sys_submodule.title_submodule', $cari);
        }
        $this->db->where('sys_submodule.status_submodule',0);
        return $this->db->count_all_results();   
    }

	public function statusSubmodule($status,$id)
	{
		$this->db->where('sys_submodule.id_submodule',$id);
		$this->db->update('sys_submodule',['status_submodule'=>$status]);
	}

    public function tambahSubmodule()
    {
        $data=
        [
            'module_id'         => htmlspecialchars($this->input->post('module')),
            'title_submodule'   => htmlspecialchars($this->input->post('title')),
            'url_submodule'     => htmlspecialchars($this->input->post('url')),
            'icon_submodule'    => htmlspecialchars($this->input->post('icon')),
            'status_submodule'  => 1
        ];

        $this->db->insert('sys_submodule',$data);
    }

    public function tambahFunc()
    {
        $data=
        [
            'module_id'         => htmlspecialchars($this->input->post('module')),
            'title_submodule'   => htmlspecialchars($this->input->post('title')),
            'url_submodule'     => htmlspecialchars($this->input->post('url')),
            'icon_submodule'    => htmlspecialchars($this->input->post('icon')),
            'parent'            => htmlspecialchars($this->input->post('parent')),
            'status_submodule'  => 0
        ];

        $this->db->insert('sys_submodule',$data);
    }

    public function ubahSubmodule($id)
    {
        $data=
        [
            'module_id'         => htmlspecialchars($this->input->post('module')),
            'title_submodule'   => htmlspecialchars($this->input->post('title')),
            'url_submodule'     => htmlspecialchars($this->input->post('url')),
            'icon_submodule'    => htmlspecialchars($this->input->post('icon')),
        ];

        $this->db->where('sys_submodule.id_submodule',$id);
        $this->db->update('sys_submodule',$data);
    }

    public function HapusSubmodule($id)
    {
        $this->db->where('id_submodule',$id);
        $this->db->delete('sys_submodule');
    }

    public function getMenuByIdModule($id)
    {
        return $this->db->get_where('sys_submodule',['status_submodule'=>1,'module_id'=>$id])->result_array();
    }

    public function getFungsiByIdModule($id)
    {
        return $this->db->get_where('sys_submodule',['status_submodule'=>0,'parent'=>$id])->result_array();
    }

    // public function countMenu($id)
    // {
    //     return $this->db->get_where('sys_submodule',['status_submodule'=>1,'module_id'=>$id])->num_rows();
    // }

    // public function countFungsi($id)
    // {
    //     return $this->db->get_where('sys_submodule',['status_submodule'=>1,'parent'=>$id])->num_rows();
    // }

    public function getMenu()
    {
        return $this->db->get_where('sys_submodule',['status_submodule'=>1])->result_array();
    }















} // END CLASS