<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model {

	function search($param)
	{
	
		$sql = "CALL searchTran(?,?,?)";
		
		$query = $this->db->query($sql,$param);
		
		mysqli_next_result($this->db->conn_id);

		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
	function details($param)
	{
	
		$sql = "select
				Transactions.customerId,
				transactionDate,
				DocumentLogs.documentId,
				documentName
				from DocumentLogs
				left join DocumentLibrary on DocumentLibrary.documentId = DocumentLogs.documentId
				left join Transactions on Transactions.transactionId = DocumentLogs.transactionId
				where Transactions.status = 0 and Transactions.customerId = ?";
		
		$query = $this->db->query($sql, $param);
		
		//mysqli_next_result($this->db->conn_id);

		return ($query->num_rows() > 0) ? $query->result() : NULL;
	}
	
}
