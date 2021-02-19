<?php

/**
 * 
 */
class Student_model extends CI_Model
{
	
	function getdata($id='')
	{
		if($id!="")
		{
			$this->db->where($id);
		}
		$this->db->select("*");
		$this->db->from("login");
		$qry=$this->db->get();
		return $qry->result();
	}

	function insert_data($data)
	{
		return $this->db->insert("login",$data);
	}

	function delete_data($id)
	{
		$this->db->where("id",$id);
		return $this->db->delete("login");
	}

	function update_data($student,$id)
	{
		$this->db->where("id",$id);
		return $this->db->update("login",$student);
	}
}
?>