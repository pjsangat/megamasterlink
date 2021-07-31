<?php
class Careers_model extends CI_Model{
  	
  	function __construct(){
  		parent::__construct();
  		$this->load->database();
    }
    
    public function getBy($where){
        $query = $this->db->where($where)->get('careers');
        return $query->result();
    }

    public function get($id){
        $query = $this->db->where('id', $id)->get('careers');
        return $query->row();
    }

    public function get_all(){
        $query = $this->db->get('careers');
        return $query->result();
        // return $result->;
    }
    public function save_career($data){
        $this->db->insert('careers', $data);
        return true;
    }
    public function update_career($id, $data){
        $this->db->where('id', $id);
        $this->db->update('careers', $data);
    }


    public function delete_career($id){
        $this->db->delete('careers', array('id' => $id));
    }

}