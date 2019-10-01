<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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
		//echo $this->session->userdata('userName');
		$data['mainContent'] =  'search';
		$this->load->view('includes/template',$data);
	}
	
	public function submit()
	{
		$param['cif'] = $this->input->post('cif');
		$param['from'] = $this->input->post('dateFrom');
		$param['to'] = $this->input->post('dateTo');
		
		$this->load->model('SearchModel');
		$query = $this->SearchModel->search($param);
		$data['query'] = $query;
		
		$data['mainContent'] =  'searchResults';
		$this->load->view('includes/template',$data);
	}
	
	public function details()
	{
		error_reporting(0);
		$param['customerId'] = $this->input->post('customerId');
		
		$this->load->model('SearchModel');
		$query = $this->SearchModel->details($param);
		$data['query'] = $query;
				
		$count = 0;
		$date[$count] = $query[$count]->transactionDate;
		
		foreach($query as $q)
		{
			if($date[$count] != $q->transactionDate)
			{
				$count++;
				$date[$count] = $q->transactionDate;
			}
			
			
		}
		
		foreach($date as $d)
		{
			echo '<h5 style="font-size:12pt;">Log Date: '. $d . '</h5>';
			
			echo '<ul>';
			foreach($query as $q)
			{
				
				if($d == $q->transactionDate)
				{	
					
					echo '<li>' . $q->documentName . '</li>';
				}
				
			}
			echo '</ul><hr/>';
		}
		
	}
}
