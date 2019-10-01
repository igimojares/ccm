<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {

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
        $this->redirectLoginChecker();
    }
	
	public function redirectLoginChecker()
	{
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect(base_url() . 'index.php');
		}
		
		if($this->session->userdata('checker') != true)
		{
			redirect(base_url() . 'index.php/welcome/accessDenied');
		}
		
	}
	 
	public function index()
	{
		$this->load->model('ApprovalModel');
		$query = $this->ApprovalModel->getApprovalList();
		$data['query'] = $query;
		
		$query = $this->ApprovalModel->getNotes();
		$data['notes'] = $query;
		
		$data['mainContent'] =  'approvals';
		$this->load->view('includes/template',$data);
	}
	
	public function submit()
	{
	
		$approve = $this->input->post('approval');
		$param['approver'] =  $this->session->userdata('userName');
		$param['approvals'] = '';
		
		foreach ($approve as $a)
		{
			$param['approvals'] .= $a . ",";
		}
		
		$this->load->model('ApprovalModel');
		$query = $this->ApprovalModel->approveTransaction($param);
		
		if($query == true)
		   {
				redirect(base_url() . 'index.php/approval/?message=Document Logs was successfully approved.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/approval/?message=An Error Occured, please try again later.&mode=false');
		   }
	}
	
	
	public function getDetails()
	{
		$param['tranactionId'] =  $this->input->post('transactionId');
		$this->load->model('ApprovalModel');
		$query = $this->ApprovalModel->getDetails($param);
		
		echo json_encode($query);
		
	}
	
	public function update()
	{
		$type = $this->input->post('submit');
		
		if($type == 'update')
		{
			
			$documents = $this->input->post('documents');
			$param['checker'] =  $this->session->userdata('userName');
			$param['transactionId'] = $this->input->post('transactionId');
			$param['documents'] = '';
		
			foreach ($documents as $d)
			{
				$param['documents'] .= $d . ",";
			}
			
			$this->load->model('ApprovalModel');
			$query = $this->ApprovalModel->updateDocs($param);
			
			if($query == true)
			{
				redirect(base_url() . 'index.php/approval/?message=Document Logs has been updated and approved.&mode=true');
			}
			else
			{
				redirect(base_url() . 'index.php/approval/?message=An Error Occured, please try again later.&mode=false');
			}
		}
		else
		{
			$param['checker'] =  $this->session->userdata('userName');
			$param['transactionId'] = $this->input->post('transactionId');
			
			
			$this->load->model('ApprovalModel');
			$query = $this->ApprovalModel->reject($param);
			
			if($query == true)
			{
				redirect(base_url() . 'index.php/approval/?message=Document Logs has been rejected.&mode=true');
			}
			else
			{
				redirect(base_url() . 'index.php/approval/?message=An Error Occured, please try again later.&mode=false');
			}
		}
	}
	
	
}
