<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends CI_Model{

	public function getModulePage($limit,$start,$cari)
	{
        $this->db->select('*');
        $this->db->from('sys_module');
        if (!empty($cari)) {
            $this->db->like('title_module', $cari);
        }

        $getData = $this->db->get('', $limit, $start);
        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;		
	}

	public function countModulePage($cari)
	{
        $this->db->select('*');
        $this->db->from('sys_module');
        $this->db->like('title_module', $cari);
        return $this->db->count_all_results();   
	}

    public function statusModule($status,$id)
    {
        $this->db->where('sys_module.id_module',$id);
        $this->db->update('sys_module',['status_module'=>$status]);
    }

    public function tambahModule()
    {
        $data=
        [
            'title_module'  => htmlspecialchars($this->input->post('title')),
            'url_module'    => htmlspecialchars($this->input->post('url')),
            'icon_module'   => htmlspecialchars($this->input->post('icon')),
            'status_module' => 0
        ];

        $this->db->insert('sys_module',$data);
    }

    public function ubahModule($id)
    {
        $data=
        [
            'title_module'  => htmlspecialchars($this->input->post('title')),
            'url_module'    => htmlspecialchars($this->input->post('url')),
            'icon_module'   => htmlspecialchars($this->input->post('icon')),
        ];

        $this->db->where('sys_module.id_module',$id);
        $this->db->update('sys_module',$data);
    }

    public function getAllModule()
    {
        return $this->db->get('sys_module')->result_array();
    }

    public function getAllModuleAkses()
    {
        return $this->db->get('sys_module')->result_array(); //DEV MODE
        // return $this->db->get_where('sys_module',['id_module >'=>2])->result_array();
    }

    public function countModule()
    {
        return $this->db->get('sys_module')->num_rows();
        // return $this->db->get_where('sys_module',['id_module >'=>2])->num_rows();
    }

    public function HapusModule($id)
    {
        $this->db->where('sys_module.id_module',$id);
        $this->db->delete('sys_module',$data);
    }


















} // END CLASS