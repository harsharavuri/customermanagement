<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
    }
    
	public function get_received_requests($email){
		$this->db->select();
        $this->db->from('users');
        $this->db->where(array('email'=>$email));
		$query =$this->db->get();
		if ($query->num_rows() > 1) {
            return $query;
        } else {
            return false;
        }	
	}
	
	public function assign_ticket($data){
		$this->db->select();
        $this->db->from('ticket');
        $this->db->where(array('ticketid'=>$data['ticketid']));
		$query =$this->db->get();
		if ($query->num_rows() == 1) {
            if(1){//$query[0]->assignee==0){
				$this->db->flush_cache();
				$this->db->select();
				$this->db->from('ticket');
				$this->db->where(array('ticketid'=>$data['ticketid']));
				$query = $this->db->update('ticket', $data);
				if($this->db->affected_rows()!=1)return false;
				return true;
			}
        } else {
            return false;
        }
	}
	
	
	public function updatestatus($data){
		$this->db->select();
        $this->db->from('ticket');
        $this->db->where(array('ticketid'=>$data['ticketid']));
		$query =$this->db->get();
		$result = $query->result();
		var_dump($query);
		if (($query->num_rows() == 1 && $result[0]->assignee==$data['assigneeid'])) {
            if(1){//$query[0]->assignee==0){
				$this->db->flush_cache();
				$this->db->select();
				$this->db->from('ticket');
				$this->db->where(array('ticketid'=>$data['ticketid']));
				$query = $this->db->update('ticket', $data);
				if($this->db->affected_rows()!=1)return false;
				return true;
			}
        } else {
            return false;
        }
	}
	
	
	
	
	public function update_status($data){
		$this->db->where(array('ticketid'=>$data['ticketid']));
				$query = $this->db->update('ticket', $data);
				if($db->affected_rows()!=1)return false;
				return true;
	}
	
	public function get_resolved_issues($email){
		$this->db->select();
        $this->db->from('ticket');
        $this->db->where(array('email'=>$email));
		$this->db->where(array('status'=>$data[status]));
		$query =$this->db->get();
		if($query->num_rows()>0)return $query;
		return false;
	}
	
	public function get_issues_unresolved($data){
		$this->db->select();
		$this->db->from('ticket');
		if(!$data['is_admin']){
			$this->db->where(array('assignee'=>data[$userid]));
		}
		$this->db->where(array('status'=>0));
		$query = $this->db->get();
		//var_dump($query);
		if($query->num_rows()>0)return $query->result();
		return false;
	}
		
		public function getticketstatus($ticketid){
		$this->db->select();
		$this->db->from('ticket');
		$this->db->where(array('ticketid'=>$ticketid));
		$query = $this->db->get();
		if($query->num_rows==1)return $query->result();
		return false;
	}	
		
    
}

/* End of file statistics_model.php */
/* Location: ./application/models/statistics_model.php */