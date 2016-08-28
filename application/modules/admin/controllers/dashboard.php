<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->config('auth/ion_auth', TRUE);
		$this->load->library('auth/ion_auth');
		
		//$this->lang->load('auth/english/ion_auth_lang');
		$this->load->model('auth/ion_auth_model');  
		$this->load->model('admin/admin_model');
		//var_dump($this->ion_auth->users()->result());
		//$this->load->library('form_validation');
		//$this->load->model('admin/admin_model');
		$this->load->helper(array('url'));
		 if (!$this->ion_auth->logged_in())
		 {
			 //redirect them to the login page
			 redirect('auth/login', 'refresh');
		 }
		// elseif ($this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		 //{
			 //redirect them to the home page because they must be an administrator to view this
			// redirect('admin/dashboard', 'refresh');
		//}

	}
	
	public function index()
	{
		$this->load->view('admin/dashboard');
		//echo 'test';
		//redirect('coreteam/statistics','301');
	}
	
	public function receivedrequests(){
				
	}
	
	public function assignissue(){
		if(!$this->ion_auth->is_admin()){
			$stat['status']='Only for admin';
			echo json_encode($stat);
			return false;
		}
		$stat['status']='failure';
		$data['ticketid']=$this->input->post('ticketid');
		$data['assignee']=$this->input->post('assigneeid');
		if($this->admin_model->assign_ticket($data)){
			$stat['status']='success';
			echo json_encode($stat);
			return true;
		}
		$stat['message']='Failed';
		echo json_encode($stat);
		return false;

	}
	
	public function updatestatus(){
		
		$stat['status']='failure';
		$data['ticketid']=$this->input->post('ticketid');
		$data['status']=$this->input->post('newstatus');
		$data['assigneeid']=$this->ion_auth->get_user_id();
		if($this->admin_model->updatestatus($data)){
			$stat['status']='success';
			echo json_encode($stat);
			return true;
		}
		$stat['message']='Failed';
		echo json_encode($stat);
		return false;
	}
	
	public function unsolvedrequests(){
		$stat['status']='failure';
		$data['is_admin'] = $this->ion_auth->is_admin();
		$data['userid'] = $this->ion_auth->get_user_id();
		$query = $this->admin_model->get_issues_unresolved($data);
		//	print($data['is_admin']);
		//var_dump($query);
		if($query!== false){$stat['message']=$query;$stat['status']='success';}
		
		echo json_encode($stat);
		return false;
	}
	
	public function checkticketstatus(){
		
		$stat['status']='failure';
		$ticketid = $this->input->post('ticketid');
		$query = $this->admin_model->getticketstatus($ticketid);
		//$query[0]->status;
		//$query = array($query);
		//echo $query->num_rows();
		if($query!== false){$stat['message']=$query[0]->status;$stat['status']='success';}
		
		echo json_encode($stat);
		return false;
	}
	
	
	public function getusers(){
		$stat['message']= $this->ion_auth->users()->result();
		$stat['status']='success';
		echo json_encode($stat);
	}
	
	

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */