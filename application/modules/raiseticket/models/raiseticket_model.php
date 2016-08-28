<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Raiseticket_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
		$this->load->database();
    }
    
    /*public function get_all_users($cols)
    {
    	$this->db->select($cols)->from('userdata');
    	$query = $this->db->get();
    	$res = array();
	foreach ($query->result_array() as $row) {
         if($row['sex']==1)
            $row['sex']="Male";
         else if($row['sex']==2)
            $row['sex']="Female";
         else 
            $row['sex']="Not specified";
	    $res[] = $row;
	}
	return $res;
    }*/
    
    /*public function get_user($id)
    {
    	$query = $this->db->select()->from('userdata')->where(array('id' => $id));
    	return $query->first_row('array');
    }*/
	
	public function raiseticket($data){
			$query = $this->db->insert('ticket', $data);
			if($query)return true;
			return false;
	}
	
	public function registercomment($data){
		$query = $this->db->insert('comments', $data);
			if($query)return true;
			return false;
	}

	public function getyourtickets($emailid){
		$this->db->select();
		$this->db->from('ticket');
		$this->db->where(array('email'=>$emailid));
		$query = $this->db->get();
		if($query->num_rows>=1)return $query->result();
		return false;
	}
	
	
	public function getalltickets(){
		$this->db->select();
		$this->db->from('ticket');
		$query = $this->db->get();
		if($query->num_rows>=1)return $query->result();
		return false;
	}


		public function gettagtickets($data){
		$this->db->select();
		$this->db->from('ticket');
		$this->db->where(array('role'=>$data['tag']));
		$query = $this->db->get();
		if($query->num_rows>=1)return $query->result();
		return false;
	}
	
	
	
	public function gettrending(){
		$this->db->select();
		$this->db->order_by("upvotes","desc");
		$query = $this->db->get('ticket',1, 5);
		if($query->num_rows > 0)return $query;
		return false;
	}
	
	public function getallissues(){
		$this->db->select();
		$this->db->order_by("upvotes","desc");
		$query = $this->db->get('ticket');
		if($query->num_rows > 0)return $query;
		return false;
	}
	

	public function getissuesontag($tag){
		$this->db->select;
		$this->db->from('ticket');
		$this->db->where(array('role'=>tag));
		$query = $this->db->get();
		if($query->num_rows > 0)return $query;
		return false;
	}
	
	public function insertcomment($data){
		$query = $this->db->insert('comments', $data);
		
	}
	
	
	public function getticketstatus($ticketid){
		$this->db->select();
		$this->db->from('ticket');
		$this->db->where(array('ticketid'=>$ticketid));
		$query = $this->db->get();
		if($query->num_rows==1)return $query->result();
		return false;
	}
	
	public function registerfb($data){
		$this->db->select();
        $this->db->from('fblogin');
        $this->db->where(array('email'=>$data['email']));
        $query = $this->db->get();
		
        if($query->num_rows()>0){
            return false;
        }
		return $this->db->insert('fblogin',$data);
	}
	
	public function isemailregistered($emailid){
		$this->db->select();
        $this->db->from('fblogin');
		$this->db->where('email',$emailid);
		$query = $this->db->get();
		if($query->num_rows() > 0)return true;
		return false;
	}
    
    
}

/* End of file statistics_model.php */
/* Location: ./application/models/statistics_model.php */