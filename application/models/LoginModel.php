<?php
class loginModel extends CI_Model
{
	
	public function getUserData($userName){
		$this->load->database();
		$query = $this->db->where('name', $userName)->get('students');
		$UserNameDB = $query->result();
    
    return $UserNameDB;
	}

}

?>