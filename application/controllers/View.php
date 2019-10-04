<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	public function __construct()
	{
		parent::__construct();
        $this->redirectLogin();
    }
	
	public function redirectLogin()
	{
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect(base_url() . 'index.php');
		}
		
		
	}
	 
	public function index()
	{
		
		$this->load->model('RecollectionModel');
		$query = $this->RecollectionModel->getColleges();
		$data['colleges'] = $query;
		
		$param['college'] = $this->input->get('college');
		
		if($param['college'] != '')
		{
			$this->load->model('ViewModel');
			$query = $this->ViewModel->getRequestByCollege($param);
			$data['query'] =  $query;
		}
		
		
		$data['mainContent'] =  'viewLineup';
		$this->load->view('includes/template',$data);
	}
	
	
	function details()
	{
		$param['id'] = $this->input->get('id');
		
		$this->load->model('RecollectionModel');
		$query = $this->RecollectionModel->getColleges();
		$data['colleges'] = $query;
		
		$this->load->model('ViewModel');
		
		$query = $this->ViewModel->getRequestDetails($param);
		$data['details'] = $query;

		$query = $this->ViewModel->getSections($param);
		$data['section'] = $query;
		
		$query = $this->ViewModel->getEmcees($param);
		$data['emcees'] = $query;
		
		$query = $this->ViewModel->getAnimators($param);
		$data['animators'] = $query;
		
		$query = $this->ViewModel->getUshers($param);
		$data['ushers'] = $query;
		
		$query = $this->ViewModel->getSingers($param);
		$data['singers'] = $query;
		
		$query = $this->ViewModel->getLeader($param);
		$data['leader'] = $query;
	

		$data['mainContent'] =  'recoLineUpDetails';
		$this->load->view('includes/template',$data);
		
	}
	

}
