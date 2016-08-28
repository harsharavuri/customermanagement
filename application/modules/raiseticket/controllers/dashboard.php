<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		
		$this->load->helper('url');

		$this->load->database();
			
		$this->load->helper('language');
		$this->load->helper(array('form', 'url'));
		$this->load->model('raiseticket/raiseticket_model','',TRUE);
	}

	
	public function index()
	{
		$this->load->view('raiseticket/dashboard');
	//	$this->load->model('raiseticket/raiseticket_model');
		//echo 'test';
		//redirect('coreteam/statistics','301');
	}
	
	public function viewyourtickets(){

		$stat['status']='failure';
		$emailid = $this->input->post('emailid');
		$query = $this->raiseticket_model->getyourtickets($emailid);
		//$query[0]->status;
		//$query = array($query);
		//echo $query->num_rows();
		if($query!== false){$stat['message']=$query;$stat['status']='success';}
		
		echo json_encode($stat);
		return false;	

	}
	
		public function getalltickets(){

		$stat['status']='failure';
		//$emailid = $this->input->post('emailid');
		$query = $this->raiseticket_model->getalltickets();
		//$query[0]->status;
		//$query = array($query);
		//echo $query->num_rows();
		if($query!== false){$stat['message']=$query;$stat['status']='success';}
		
		echo json_encode($stat);
		return false;	

	}
	
	public function gettagtickets(){
		$data['tag']=$this->input->post('tag');
		$stat['status']='failure';
		//$emailid = $this->input->post('emailid');
		$query = $this->raiseticket_model->gettagtickets($data);
		//$query[0]->status;
		//$query = array($query);
		//echo $query->num_rows();
		if($query!== false){$stat['message']=$query;$stat['status']='success';}
		
		echo json_encode($stat);
		return false;	

	}

	
	public function gettrending(){

	}
	
	public function checkticketstatus(){
		
		$stat['status']='failure';
		$ticketid = $this->input->post('ticketid');
		$query = $this->raiseticket_model->getticketstatus($ticketid);
		//$query[0]->status;
		//$query = array($query);
		//echo $query->num_rows();
		if($query!== false){$stat['message']=$query[0]->status;$stat['status']='success';}
		
		echo json_encode($stat);
		return false;
	}
	
	public function registeruser(){
		
		$stat['status']='false';
		//$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['firstname'] = $this->input->post('first_name');
		$data['lastname'] = $this->input->post('last_name');
		
		if($this->raiseticket_model->registerfb($data)){
			$stat['status']='true';
		}else{
			$stat['message']='error';
		}
		echo json_encode($stat);
		return TRUE;
	}
	
	public function raise_ticket(){
		$stat['status']='failure';
		$data['ticketid']=$this->input->post('ticketid');
		$data['email']=$this->input->post('email');
		$data['adminpriority']=$this->input->post('adminpriority');
		$data['status']=$this->input->post('status');
		$data['time']=$this->input->post('time');
		$data['upvotes']=$this->input->post('upvotes');
		$data['downvotes']=$this->input->post('downvotes');
		$data['role']=$this->input->post('role');
		$data['description']=$this->input->post('description');
		$data['assignee']=$this->input->post('assignee');
		if($this->raiseticket_model->raiseticket($data)){
			$stat['status']='success';
			$stat['message']='ID:'+$this->input->post('ticketid');
			echo json_encode($stat);
			return true;
		}
		$stat['message']='Failed';
		echo json_encode($stat);
		return false;
	}
	
	
	public function addComments(){
		$this->load->view('raiseticket/comments');
	}
	
	public function register_comment(){
		$stat['comment']='comment';
		$data['ticketid']=$this->input->post('ticketid');
		$data['email']=$this->input->post('email');
		if($this->raiseticket_model->registercomment($data)){
			$stat['status']='success';
			//$stat['message']='ID:'+$this->input->post('ticketid');
			echo json_encode($stat);
			return true;
		}
		$stat['message']='Failed';
		echo json_encode($stat);
		return false;
		
	}
	
	
	function assignissue(){
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */