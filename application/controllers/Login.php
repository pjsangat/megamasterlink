<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    
    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('pages/login');
    }

    public function authenticate(){
        $this->load->model('Login_model', 'login');

    	$cardential = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pwd'))
        ];
        
        $this->form_validation->set_rules('username', 'Username', array('required'));
        $this->form_validation->set_rules('pwd', 'Password', array('required'));

        if($this->form_validation->run() ===FALSE){
            $this->load->View('pages/login');
        }else{
            $u = $this->login->get_user_cardential($cardential);
                 
            if($u) {
                foreach($u as $user){
                    $this->session->set_userdata('user_name', $user['name']);
                    $this->session->set_userdata('user_id', $user['id']);
                    redirect("admin/dashboard/");
                }
            }else{
               	$this->session->set_flashdata('msg',"Error! Your cardential is incorrect!");
               	redirect('login/');
            }
        }
    	      
    }

}