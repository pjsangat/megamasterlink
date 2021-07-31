<?php

class Careers extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user_id')){ redirect('login');}
    }


  	public function index(){
        $this->load->model('Careers_model', 'careers');
        $data['data'] = $this->careers->get_all();
        $this->load->view('pages/admin/careers/index', $data);
    }
      
    public function add(){
        $this->load->library('form_validation');
        $this->load->view('pages/admin/careers/add');
    }

    public function edit($id){
        $this->load->model('Careers_model', 'careers');
        if(!empty($id)){
            $data['data'] = $this->careers->get($id);
            if(empty($data['data'])){
                redirect('admin/careers');
            }else{
                $this->load->library('form_validation');
                $this->load->view('pages/admin/careers/edit', $data);
            }
        }else{
            redirect('admin/careers');
        }
    }

    public function delete($id){
        if(!empty($id)){
            $this->load->model('Careers_model', 'careers');
            $this->careers->delete_career($id);

            $this->session->set_flashdata('success',"Career successfully deleted.");
            redirect('admin/careers');
        }
    }

    public function save(){
        $this->load->library('form_validation');
        $input = $this->input->post();

        if( count($input) > 0){
            $this->form_validation->set_rules('position', 'Position', array('required'));
            $this->form_validation->set_rules('department', 'Department', array('required'));
            $this->form_validation->set_rules('emp_type', 'Employee Type', array('required'));
            $this->form_validation->set_rules('qualifications', 'Qualifications', array('required'));
            
            if($this->form_validation->run() === FALSE){
                $this->load->View('pages/admin/careers/add');
            }else{
                $this->load->model('Careers_model', 'careers');
                unset($input['submit']);

                $this->careers->save_career($input);

                $this->session->set_flashdata('success',"Career successfully saved.");
                redirect('admin/careers');
            }

            
        }else{
            redirect('not_found');
        }
    }

    public function update($id){
        $this->load->library('form_validation');
        $input = $this->input->post();

        if( count($input) > 0){
            $this->form_validation->set_rules('position', 'Position', array('required'));
            $this->form_validation->set_rules('department', 'Department', array('required'));
            $this->form_validation->set_rules('emp_type', 'Employee Type', array('required'));
            $this->form_validation->set_rules('qualifications', 'Qualifications', array('required'));
            
            $this->load->model('Careers_model', 'careers');
            
            if($this->form_validation->run() === FALSE){
                $data = array();
                $data['data'] = $this->careers->get($id);
                $this->load->View('pages/admin/careers/edit', $data);
            }else{
                unset($input['submit']);

                $this->careers->update_career($id, $input);

                $this->session->set_flashdata('success',"Career successfully updated.");
                redirect('admin/careers');
            }

            
        }else{
            redirect('not_found');
        }
    }
}
