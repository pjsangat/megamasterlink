<?php

class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user_id')){ redirect('login');}
    }


  	public function index(){
       $this->load->view('pages/admin/dashboard');
  	}

}
