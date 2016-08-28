<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
        $this->load->library('nativesession');

    }

    public function index()
    {   
		
		redirect(base_url("raiseticket/login"), "location", 301);
        
    }
    public function get_college($cid){
        echo json_encode($this->user->get_college($cid));
    }

}