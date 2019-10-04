<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewModel extends CI_Model {

	function getRequestByCollege($param)
	{
		$this->db->select('request.id');
		$this->db->select('colleges.college');
		$this->db->select('venue');
		$this->db->select('recollectionDate');
		$this->db->from('request');
		$this->db->join('colleges', 'colleges.id = request.college');
		$this->db->where('request.college =', $param['college']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
		
	}
	
	function getRequestDetails($param)
	{
		$this->db->select('request.id');
		$this->db->select('request.college');
		$this->db->select('venue');
		$this->db->select('mainCelebrant');
		$this->db->select('dateRequested');
		$this->db->select('noOfConfessors');
		$this->db->select('speaker');
		$this->db->select('noOfAttendedStudents');
		$this->db->select('noOfConfession');
		$this->db->select('recollectionDate');
		$this->db->select('DATE_FORMAT(recollectionDate, \'%Y-%m-%dT%H:%i\') AS custom_date ');
		$this->db->from('request');
		$this->db->join('colleges', 'colleges.id = request.college');
		$this->db->where('request.id =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	
	function getSections($param)
	{
		$this->db->select('*');
		$this->db->from('sections');
		$this->db->where('request =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	function getEmcees($param)
	{
		$this->db->select('*');
		$this->db->from('emcee');
		//$this->db->join('colleges', 'colleges.id = emcee.college');
		$this->db->where('request =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	function getAnimators($param)
	{
		$this->db->select('*');
		$this->db->from('animators');
		//$this->db->join('colleges', 'colleges.id = animators.college');
		$this->db->where('request =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	function getUshers($param)
	{
		$this->db->select('*');
		$this->db->from('usher');
		//$this->db->join('colleges', 'colleges.id = usher.college');
		$this->db->where('request =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	function getSingers($param)
	{
		$this->db->select('*');
		$this->db->from('singers');
		//$this->db->join('colleges', 'colleges.id = singers.college');
		$this->db->where('request =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	function getLeader($param)
	{
		$this->db->select('*');
		$this->db->from('prayerLeader');
		//$this->db->join('colleges', 'colleges.id = prayerLeader.college');
		$this->db->where('request =', $param['id']);
		$query = $this->db->get();
		
		return ($query->num_rows() > 0) ? $query->result() : NULL;	
	
	}
	
	
}
