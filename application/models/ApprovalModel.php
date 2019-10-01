<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalModel extends CI_Model {


	
	function getApprovalList()
	{
		$sql = 'CALL getApprovalList()';
		
		$query = $this->db->query($sql);
		mysqli_next_result($this->db->conn_id);
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;
			
	}
	
	function approveTransaction($param)
	{
	
		$sql = "CALL approveTransaction(?,?)";
		
		$this->db->trans_begin();

		$query = $this->db->query($sql,$param);
		
		mysqli_next_result($this->db->conn_id);

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
		//return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function getNotes()
	{
		$sql = "select * from DocumentLibrary order by documentType asc;";
		
		$query = $this->db->query($sql);
		

		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function getDetails($param)
	{
		$sql = "select * from DocumentLogs where TransactionId = ?;";
		
		$query = $this->db->query($sql,$param);
		
	
		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function updateDocs($param)
	{
		
		$sql = "CALL updateTransaction(?,?,?)";
		
		$this->db->trans_begin();

		$query = $this->db->query($sql,$param);
		
		mysqli_next_result($this->db->conn_id);

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
	
	function reject($param)
	{
		$sql = "CALL reject(?,?)";
		
		$this->db->trans_begin();

		$query = $this->db->query($sql,$param);
		
		mysqli_next_result($this->db->conn_id);

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
