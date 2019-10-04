<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecollectionModel extends CI_Model {


	
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
	
	function submit($param)
	{
		
		$post_data = array(
        'college'   =>  $param['college'],
        'recollectionDate'   =>  $param['date'],
        'venue' => $param['venue'],
		'speaker' => $param['speaker'],
		'mainCelebrant' => $param['mainCelebrant'],
		'noOfConfessors' => $param['confessors'],
		'noOfAttendedStudents' => $param['students'],
		'noOfConfession' => $param['confession'],
		'dateRequested' => date('Y-m-d H:i:s'),
		'requestedBy' => $this->session->userdata('username'),
		'status' => 'requested'
		);
		
		$this->db->insert('request',$post_data);
	
		return $this->db->insert_id();
		
	}
	
	function deleteRec($param)
	{
		$this->db->where('id', $param['requestId']);
		$this->db->delete('request');
	}
	
	function update($param)
	{
		
		$post_data = array(
		'id' => $param['requestId'],
        'college'   =>  $param['college'],
        'recollectionDate'   =>  $param['date'],
        'venue' => $param['venue'],
		'speaker' => $param['speaker'],
		'mainCelebrant' => $param['mainCelebrant'],
		'noOfConfessors' => $param['confessors'],
		'noOfAttendedStudents' => $param['students'],
		'noOfConfession' => $param['confession'],
		'dateRequested' => date('Y-m-d H:i:s'),
		'requestedBy' => $this->session->userdata('username'),
		'status' => 'requested'
		);
		
		$this->db->insert('request',$post_data);
	
		return $this->db->insert_id();
		
	}
	
	function addSections($param)
	{
		$post_data = array(
		'request' => $param['requestId'],
		'section' => $param['section'],
		'studentCount' => $param['sectionCount']
		);
		
		$this->db->insert('sections',$post_data);
		
	}
	
	function addEmcee($param)
	{
		$post_data = array(
		'request' => $param['requestId'],
		'name' => $param['name'],
		'college' => $param['college']
		);
		
		$this->db->insert('emcee',$post_data);
		
	}
	
	
	function addAnimator($param)
	{
		$post_data = array(
		'request' => $param['requestId'],
		'name' => $param['name'],
		'college' => $param['college']
		);
		
		$this->db->insert('animators',$post_data);
		
	}
	
	
		
	function addUsher($param)
	{
		$post_data = array(
		'request' => $param['requestId'],
		'name' => $param['name'],
		'college' => $param['college']
		);
		
		$this->db->insert('usher',$post_data);
		
	}
	
	function addSinger($param)
	{
		$post_data = array(
		'request' => $param['requestId'],
		'name' => $param['name'],
		'college' => $param['college']
		);
		
		$this->db->insert('singers',$post_data);
		
	}
	
	function addPrayerLeader($param)
	{
		$post_data = array(
		'request' => $param['requestId'],
		'name' => $param['name'],
		'college' => $param['college']
		);
		
		$this->db->insert('prayerLeader',$post_data);
		
	}
	
	function getColleges()
	{
		$sql = "select * from colleges";
		
		$query = $this->db->query($sql);
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	}
}
