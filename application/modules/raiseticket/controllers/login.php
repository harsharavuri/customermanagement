<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('raiseticket/login');
		//echo 'test';
		//redirect('coreteam/statistics','301');
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */