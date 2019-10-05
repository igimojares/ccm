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
	
	function getUserById($param)
	{
		$sql = 'select * from users where username = ? limit 1';
		$query = $this->db->query($sql, array($param['username']));
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;
			
	}
	
	function checkKey($param)
	{
		$sql = 'select * from users where md5(id) = ? limit 1';
		$query = $this->db->query($sql, array($param['key']));
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function changePassword($param)
	{
		$sql = 'update users set password = ?,  status = \'Active\' where md5(id) = ?';
		$query = $this->db->query($sql, array($param['password'], $param['key']));
		
		echo $this->db->last_query();
		//return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function addUser($param)
	{
		
		$post_data = array(
        'username'   =>  $param['username'],
        'password' => $param['password'],
		'firstName' => $param['firstName'],
		'lastName' => $param['lastName'],
		'email' => $param['email'],
		'dateCreated' => date('Y-m-d H:i:s'),
		'status' => 'Active'
		);
	
		$this->db->trans_begin();

		$this->db->insert('users',$post_data);
		
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
		$sql = "update Users set isAdmin = '". $param['admin'] ."',status = '" . $param['active'] . "' where userName = '". $param['username'] ."';";
				
		
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
