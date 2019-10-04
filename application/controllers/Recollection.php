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
		
		$data['mainContent'] =  'message';
		$this->load->view('includes/template',$data);
	}
	
	function add()
	{
		
		$this->load->model('RecollectionModel');
		$query = $this->RecollectionModel->getColleges();
		$data['colleges'] = $query;
		
		$data['mainContent'] =  'recoLineUp';
		$this->load->view('includes/template',$data);
		
	}
	
	function submit()
	{
		$param['college'] = $this->input->post('college');
		$param['date'] = $this->input->post('date');
		$param['venue'] = $this->input->post('venue');
		$param['speaker'] = $this->input->post('speaker');
		$param['mainCelebrant'] = $this->input->post('mainCelebrant');
		$param['confessors'] = $this->input->post('confessors');
		$param['students'] = $this->input->post('students');
		$param['confession'] = $this->input->post('confession');
		
		$param['emcee'] = $this->input->post('emcee');
		$param['emceeCollege'] = $this->input->post('emceeCollege');
		
		$param['section'] = $this->input->post('section');
		$param['sectionCount'] = $this->input->post('sectionCount');
		
		$param['usher'] = $this->input->post('usher');
		$param['usherCollege'] = $this->input->post('usherCollege');
		
		$param['animator'] = $this->input->post('animator');
		$param['animatorCollege'] = $this->input->post('animatorCollege');
		
		$param['singer'] = $this->input->post('soloSinger');
		$param['singerCollege'] = $this->input->post('soloSingerCollege');
		
		$param['prayerLeader'] = $this->input->post('prayerLeader');
		$param['prayerLeaderCollege'] = $this->input->post('prayerLeaderCollege');
	

       $this->load->model('RecollectionModel');
		$query =  $this->RecollectionModel->submit($param);
		$param['requestId'] = $query;
		
		if(!empty($param['section'])){
			
			foreach($param['section'] as $q)
			{
				$section['section'][] = $q;
			
			}
			foreach($param['sectionCount'] as $q)
			{
				$section['sectionCount'][] = $q;
			}
			
			$i = 0;
			$count = count($param['section']);
		
			for($i; $i<$count; $i++)
			{
				$param['section'] = $section['section'][$i];
				$param['sectionCount'] = $section['sectionCount'][$i];
				$this->RecollectionModel->addSections($param);
			}
	
		}
		
		if(!empty($param['emcee'])){
			
			unset($array);
			
			foreach($param['emcee'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['emceeCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['emcee']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addEmcee($param);
			}
			
		}
		
		if(!empty($param['animator'])){
			
						
			unset($array);
			
			foreach($param['animator'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['animatorCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['animator']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addAnimator($param);
			}
			
		}
		
		
		if(!empty($param['usher'])){
			
			unset($array);
			
			foreach($param['usher'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['usherCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['usher']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addUsher($param);
			}
			
		}
		
		if(!empty($param['singer'])){
			
			unset($array);
			
			
			foreach($param['singer'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['singerCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['singerCollege']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addSinger($param);
			}
			
		}

		if(!empty($param['prayerLeader'])){
			
			unset($array);
		
			foreach($param['prayerLeader'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['prayerLeaderCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['prayerLeader']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addPrayerLeader($param);
			}
			
		}			
			
		   
		if($query > 0)
		   {
				redirect(base_url() . 'index.php/Recollection/?message=Recollection Line-up was successfully added.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/Recollection/?message=An Error Occured, please try again later.&mode=false');
		   }
        
	}
	
	function update()
	{
		$param['requestId'] = $this->input->post('requestId');
		$param['college'] = $this->input->post('college');
		$param['date'] = $this->input->post('date');
		$param['venue'] = $this->input->post('venue');
		$param['speaker'] = $this->input->post('speaker');
		$param['mainCelebrant'] = $this->input->post('mainCelebrant');
		$param['confessors'] = $this->input->post('confessors');
		$param['students'] = $this->input->post('students');
		$param['confession'] = $this->input->post('confession');
		
		$param['emcee'] = $this->input->post('emcee');
		$param['emceeCollege'] = $this->input->post('emceeCollege');
		
		$param['section'] = $this->input->post('section');
		$param['sectionCount'] = $this->input->post('sectionCount');
		
		$param['usher'] = $this->input->post('usher');
		$param['usherCollege'] = $this->input->post('usherCollege');
		
		$param['animator'] = $this->input->post('animator');
		$param['animatorCollege'] = $this->input->post('animatorCollege');
		
		$param['singer'] = $this->input->post('soloSinger');
		$param['singerCollege'] = $this->input->post('soloSingerCollege');
		
		$param['prayerLeader'] = $this->input->post('prayerLeader');
		$param['prayerLeaderCollege'] = $this->input->post('prayerLeaderCollege');
	

       $this->load->model('RecollectionModel');
		$this->RecollectionModel->deleteRec($param);
		$query =  $this->RecollectionModel->update($param);
		$param['requestId'] = $query;
		
		if(!empty($param['section'])){
			
			foreach($param['section'] as $q)
			{
				$section['section'][] = $q;
			
			}
			foreach($param['sectionCount'] as $q)
			{
				$section['sectionCount'][] = $q;
			}
			
			$i = 0;
			$count = count($param['section']);
		
			for($i; $i<$count; $i++)
			{
				$param['section'] = $section['section'][$i];
				$param['sectionCount'] = $section['sectionCount'][$i];
				$this->RecollectionModel->addSections($param);
			}
	
		}
		
		if(!empty($param['emcee'])){
			
			unset($array);
			
			foreach($param['emcee'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['emceeCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['emcee']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addEmcee($param);
			}
			
		}
		
		if(!empty($param['animator'])){
			
						
			unset($array);
			
			foreach($param['animator'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['animatorCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['animator']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addAnimator($param);
			}
			
		}
		
		
		if(!empty($param['usher'])){
			
			unset($array);
			
			foreach($param['usher'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['usherCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['usher']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addUsher($param);
			}
			
		}
		
		if(!empty($param['singer'])){
			
			unset($array);
			
			
			foreach($param['singer'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['singerCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['singerCollege']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addSinger($param);
			}
			
		}

		if(!empty($param['prayerLeader'])){
			
			unset($array);
		
			foreach($param['prayerLeader'] as $q)
			{
				$array['name'][] = $q;
			
			}
			foreach($param['prayerLeaderCollege'] as $q)
			{
				$array['college'][] = $q;
			}
			
			$i = 0;
			$count = count($param['prayerLeader']);
			
		
			for($i; $i<$count; $i++)
			{
				$param['name'] = $array['name'][$i];
				$param['college'] = $array['college'][$i];
				$this->RecollectionModel->addPrayerLeader($param);
			}
			
		}			
			
		   
		if($query > 0)
		   {
				redirect(base_url() . 'index.php/Recollection/?message=Recollection Line-up was successfully added.&mode=true');
		   }
		   else
		   {
				redirect(base_url() . 'index.php/Recollection/?message=An Error Occured, please try again later.&mode=false');
		   }
        
	}

}
