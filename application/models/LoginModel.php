<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


	
	function validateLogin($param)
	{
		$sql = 'select * from users where username = ? and password = ?';
		
		$query = $this->db->query($sql,$param);
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;
			
	}
	
	function getUsers()
	{
		$sql = 'select * from users';
		
		$query = $this->db->query($sql);
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;
			
	}
	
	function addUser($param)
	{
		$sql = "insert into Users(userName, password, firstName, lastName, email, isActive, maker)
				values('".$param['username']."','". $param['password'] ."','" . $param['firstName'] ."','" . $param['lastName'] . "','" . $param['email'] . "',1,1);";	
		
		//echo $sql;
		$this->db->trans_begin();

		$query = $this->db->query($sql,$param);
		
		//mysqli_next_result($this->db->conn_id);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
	
	
	function updateUser($param)
	{
		$sql = "update Users set maker = '". $param['maker'] ."',checker = '" . $param['checker'] . "' where userName = '". $param['username'] ."';";
				
		
		echo $sql;
		$this->db->trans_begin();

		$query = $this->db->query($sql,$param);
		
		//mysqli_next_result($this->db->conn_id);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
}
