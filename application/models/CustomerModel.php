<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model {


	
	function checkCustomer($cif)
	{
		$sql = "CALL checkCustomer(?);";
		
		$query = $this->db->query($sql,array($cif));
		
		mysqli_next_result($this->db->conn_id);
		
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
			
	}
	
	function addCustomer($param)
	{
	
		$sql = "CALL addCustomer(?,?,?,?,?)";
		
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
	
	function searchCustomer($param)
	{
		//$sql = "select * from Customers WHERE CONCAT_WS('', firstName, middleName, lastName) LIKE '%".$param['search']."%' limit 20;";
		$sql = "CALL searchCustomer('". $param['search']."')";
		
		$query = $this->db->query($sql);
		mysqli_next_result($this->db->conn_id);

		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function getNotes()
	{
		$sql = "select * from DocumentLibrary order by documentType asc";
		
		$query = $this->db->query($sql);
		//mysqli_next_result($this->db->conn_id);

		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	
	function addTransactions($param)
	{
	
		$sql = "CALL addTransactions(?,?,?)";
		
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
	
	function getTransactions()
	{
		$sql = "select date_Format(transactionDate,'%Y-%m-%d') transactionDate, count(transactionId) notran from transactions where status = 0 group by date_Format(transactionDate,'%Y-%m-%d')  limit 7;";
		
		$query = $this->db->query($sql);
		//mysqli_next_result($this->db->conn_id);

		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function topDocs()
	{
		$sql = "select 
				count(DocumentLogs.documentId) as docCount, 
				documentName from DocumentLogs 
				join DocumentLibrary on DocumentLibrary.documentId = DocumentLogs.documentId 
				join Transactions on Transactions.transactionId = DocumentLogs.transactionId
				where status = 0 group by DocumentLogs.documentId order by docCount desc limit 10;
				";
		
		$query = $this->db->query($sql);
		//mysqli_next_result($this->db->conn_id);

		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	}
}
