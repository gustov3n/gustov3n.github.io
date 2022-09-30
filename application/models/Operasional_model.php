<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operasional_model extends CI_Model{

	public function getOperasionalByNoreg($noreg)
	{
		return $this->db->get_where('tbl_operasional',['noreg'=>$noreg])->result_array();
	}






} // END CLASS