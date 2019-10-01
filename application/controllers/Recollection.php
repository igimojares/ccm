<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recollection extends CI_Controller {

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
        $this->redirectLoginMaker();
    }
	
	public function redirectLoginMaker()
	{
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect(base_url() . 'index.php');
		}
		
		if($this->session->userdata('maker') != true)
		{
			redirect(base_url() . 'index.php/welcome/accessDenied');
		}
		
	}
	 
	public function index()
	{
		//echo $this->session->userdata('userName');
		$param['search'] =  $this->input->get('search');
		
		$this->load->model('CustomerModel');
		$query = $this->CustomerModel->searchCustomer($param);
		$data['query'] = $query;
		//print_r($query);
		
		$query = $this->CustomerModel->getNotes();
		$data['notes'] = $query;
		
		$data['mainContent'] =  'customerTransaction';
		$this->load->view('includes/template',$data);
	}
	
	function add()
	{
		//$param['search'] =  $this->input->get('search');
		
		/*$this->load->model('CustomerModel');
		$query = $this->CustomerModel->searchCustomer($param);
		$data['query'] = $query;
		//print_r($query);
		
		$query = $this->CustomerModel->getNotes();
		$data['notes'] = $query;*/
		
		$data['mainContent'] =  'recoLineUp';
		$this->load->view('includes/template',$data);
		
	}
	
	function addCustomer()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cif', 'CIF', 'callback_cif_check|required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('middleName', 'Middle Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
			$data['mainContent'] =  'addClient';
			$this->load->view('includes/template',$data);
        }
        else
        {
		   $param['cif'] = $this->input->post('cif');
		   $param['lastName'] = $this->input->post('lastName');
		   $param['firstName'] = $this->input->post('firstName');
		   $param['middleName'] =  $this->input->post('middleName');
		   $param['addedBy'] = $this->session->userdata('userName');
		   
           $this->load->model('CustomerModel');
		   $query = $this->CustomerModel->addCustomer($param);
		   
		   if($query == true)
		   {
				redirect(base_url() . 'index.php/customer/?message=Customer was successfully added.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/customer/?message=An Error Occured, please try again later.&mode=false');
		   }
        }
	}
	
	function cif_check($cif)
	{
		$this->load->model('CustomerModel');
		$query = $this->CustomerModel->checkCustomer($cif);
		
		if($query == true)
		{
			$this->form_validation->set_message('cif_check', '{field} is already exist');
            return false;
		}
		else
		{
			return true;
		}
	}
	
	/*function add()
	{
		$documents = $this->input->post('documents');
		$param['maker'] =  $this->session->userdata('userName');
		$param['customerId'] = $this->input->post('customerId');
		$param['documents'] = '';
		
		foreach ($documents as $d)
		{
			$param['documents'] .= $d . ",";
		}
		
		$this->load->model('CustomerModel');
		$query = $this->CustomerModel->addTransactions($param);
		
		if($query == true)
		   {
				redirect(base_url() . 'index.php/transaction/?message=Document Logs has been added.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/transaction/?message=An Error Occured, please try again later.&mode=false');
		   }
		
	}*/
}
