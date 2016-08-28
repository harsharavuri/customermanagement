<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
        $this->load->library('nativesession');
    }

    private function is_logged_in()
    {
        if ($this->nativesession->get('userid') === null) {
            return false;
        } else {
            if($this->user->profile_fill_check($this->nativesession->get('userid')))
                redirect(base_url("update_profile"), "location", 301);
            return true;
        }
    }

    public function index()
    {   $data['fest']="SpringSpree";
        // redirect(base_url("events"), "location", 301);
        if (!$this->is_logged_in()) {
            redirect(base_url("home"), "location", 301);
            return;
        }

        $stat = $this->user->get_details($this->nativesession->get('userid'));
        
        $data['registration'] = intval($stat->registration);
        $data['hospitality'] = intval($stat->hospitality);
        $data['proshows'] = intval($stat->proshows);

        $data['main_heading'] = "Registration";
        $data['side_heading'] = "One time registration fees to participate in".$data['fest'];
        $data['current_page'] = "registration";
        $data['userDetails'] = $this->user->get_details($this->nativesession->get('userid'));
        $this->load->view('base/header', $data);
        $this->load->view('registration/index', $data);
        $this->load->view('base/footer', $data);
    }
    
    public function index4()
    {
        // redirect(base_url("events"), "location", 301);
        if (!$this->is_logged_in()) {
            redirect(base_url("home"), "location", 301);
            return;
        }

        $stat = $this->user->get_details($this->nativesession->get('userid'));
        
        $data['registration'] = intval($stat->registration);
        $data['hospitality'] = intval($stat->hospitality);

        $data['main_heading'] = "SS Registration";
        $data['side_heading'] = "One time registration fees to participate in SpringSpree 15";
        $data['current_page'] = "registration";
        $data['userDetails'] = $this->user->get_details($this->nativesession->get('userid'));
        $this->load->view('base/header', $data);
        $this->load->view('registration/index', $data);
        $this->load->view('base/footer', $data);
    }
    
}
