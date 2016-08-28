<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
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
            return true;
        }
    }

    public function index()
    {  $data['fest']="SpringSpree";
        // redirect(base_url("events"), "location", 301);
        if (!$this->is_logged_in()) {
            redirect(base_url("home"), "location", 301);
            return;
        }

        // User Details
        $data['userDetails'] = $this->user->get_details($this->nativesession->get('userid'));

        $data['main_heading'] = "SPRINGSPREE PROFILE";
        $data['side_heading'] = "Annual cultural festival of NIT, Warangal - 11<sup>th</sup>March - 13 <sup>st</sup> March, 2016";
        $data['current_page'] = "profile";
        $this->load->view('base/header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('base/footer');
    }
}
