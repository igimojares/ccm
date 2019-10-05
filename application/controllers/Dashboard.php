<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		error_reporting(0);
		
		$this->load->model('recollectionModel');
		$query = $this->recollectionModel->getTotals();
		$data['totals'] = $query;
		
		$data['mainContent'] =  'dashboard';
		$this->load->view('includes/template',$data);
	}
	
	
}
