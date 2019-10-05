<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
       // $this->redirectLogin();
    }
	
	public function index()
	{
		if($this->session->userdata('logged_in') != TRUE)
		{
			$data['error'] = '';
			$this->load->view('welcome_message',$data);
		}
		else
		{
			redirect(base_url() . 'index.php/dashboard/');
		}
	}
	
	public function redirectLogin()
	{
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect(base_url() . 'index.php');
		}
	}
	
	public function redirectLoginAdmin()
	{
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect(base_url() . 'index.php');
		}
		
		if($this->session->userdata('admin') != '1')
		{
			redirect(base_url() . 'index.php/welcome/accessDenied');
		}
	}
	
	function validate()
	{
		$param['username'] = $this->input->post('username');
		$param['password'] = md5($this->input->post('password'));
		
		//print_r($param);
		
		$this->load->model('LoginModel');
		$query = $this->LoginModel->validateLogin($param);
		
		if(!empty($query))
		{
			$this->session->set_userdata('id',$query[0]->id);
			$this->session->set_userdata('username',$query[0]->username);
			$this->session->set_userdata('firstName',$query[0]->firstName);
			$this->session->set_userdata('lastName',$query[0]->lastName);
			$this->session->set_userdata('admin',$query[0]->isAdmin);
			$this->session->set_userdata('logged_in',true);
			
			redirect(base_url().'index.php/dashboard/');
		}
		else
		{
			$data['error'] = 'Invalid username/password';
			$this->load->view('welcome_message',$data);
		}
	}
	
	function accessDenied()
	{
		$data['mainContent'] =  'accessDenied';
		$this->load->view('includes/template',$data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'index.php');
	}
	
	function admin()
	{
		
		$this->redirectLoginAdmin();
		
		$this->load->model('LoginModel');
		$query = $this->LoginModel->getUsers();
		$data['query'] =  $query;
		
		$data['mainContent'] =  'admin';
		$this->load->view('includes/template',$data);
	}
	
	function addUser()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'User name', 'required');
		$this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confPassword', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
			$data['mainContent'] =  'register';
			$this->load->view('includes/template',$data);
        }
        else
        {
		   $param['username'] = $this->input->post('username');
		   $param['email'] = $this->input->post('email');
		   $param['firstName'] = $this->input->post('firstName');
		   $param['lastName'] =  $this->input->post('lastName');
		   $param['password'] = md5($this->input->post('password'));
		   
           $this->load->model('LoginModel');
		   $query = $this->LoginModel->addUser($param);
		   
		   if($query == true)
		   {
				redirect(base_url() . 'index.php/?message=User was successfully added.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/?message=An Error Occured, please try again later.&mode=false');
		   }
        }
	}
	
	
	function addUserAdmin()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'User name', 'required');
		$this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
        $this->form_validation->set_rules('firstName', 'First Name', 'required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confPassword', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
			$data['mainContent'] =  'admin';
			$this->load->view('includes/template',$data);
        }
        else
        {
		   $param['username'] = $this->input->post('username');
		   $param['email'] = $this->input->post('email');
		   $param['firstName'] = $this->input->post('firstName');
		   $param['lastName'] =  $this->input->post('lastName');
		   $param['password'] = md5($this->input->post('password'));
		   
           $this->load->model('LoginModel');
		   $query = $this->LoginModel->addUser($param);
		   
		   if($query == true)
		   {
				redirect(base_url() . 'index.php/welcome/admin?message=User was successfully added.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/welcome/admin?message=An Error Occured, please try again later.&mode=false');
		   }
        }
	}
	
	
	function register()
	{
		
		$data['error'] = '';
		$data['mainContent'] =  'register';
		$this->load->view('includes/template',$data);
	
	}
	
	function forgot()
	{
		$data['error'] = '';
		$data['mainContent'] =  'forgot';
		$this->load->view('includes/template',$data);
		
	}
	
	function forgotSubmit()
	{
		$param['username'] = $this->input->post('username');
		
		$this->load->model('LoginModel');
		
		$query =  $this->LoginModel->getUserById($param);
		
		if(!empty($query))
		{
			$url = base_url() . 'index.php/welcome/changePass/?key=' . md5($query[0]->id);
			
			$this->load->library('email');

			$this->email->from('noreply@campusministry.com', 'No Reply');
			$this->email->to($query[0]->email);


			$this->email->subject('UST Campus Ministry Change Password');
			$this->email->message('<p>Please see the click the <a href="'. $url .'">here</a> to change your password</p>');

			$this->email->send();

			
			//echo $url;
		}
		
		redirect(base_url() . 'index.php/?message=Password change instructions was sent to your mail.&mode=true');
		
	}
	
	function changePass()
	{
		$param['key'] = $this->input->get('key');
		
		$this->load->model('LoginModel');
		$query = $this->LoginModel->checkKey($param);
		
		if(!empty($query))
		{
			$data['mainContent'] =  'changepass';
			$this->load->view('includes/template',$data);
			
		}
		else
		{
			redirect(base_url() . 'index.php/?message=Opps! Something went wrong');
		}
	
	}
	
	function updatePassword()
	{
		$param['key'] = $this->input->post('key');
		$param['password'] = md5($this->input->post('password'));
		
		$this->load->model('LoginModel');
		$query = $this->LoginModel->changePassword($param);
		
		redirect(base_url() . 'index.php/?message=your password has been changed.');
	}
	
	function update()
	{
		$param['username'] = $this->input->post('user');
		$param['admin'] = $this->input->post('admin');
		$param['active'] = $this->input->post('active');
		
		if($param['active'] == '1')
		{
			$param['active'] = 'Active';
		}
		else
		{
			$param['active'] = 'Inactive';
		}
		
		$this->load->model('LoginModel');
		$query = $this->LoginModel->updateUser($param);
		 if($query == true)
		   {
				redirect(base_url() . 'index.php/welcome/admin/?message=User was successfully updated.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/welcome/admin/?message=An Error Occured, please try again later.&mode=false');
		   }
	}
}
