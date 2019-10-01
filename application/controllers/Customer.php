<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$data['mainContent'] =  'addClient';
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
}
