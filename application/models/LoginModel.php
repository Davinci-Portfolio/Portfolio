<?php
class loginModel extends CI_Model
{
	
	public function getUserData($userName){
		$this->load->database();
		$query = $this->db->where('name', $userName)->get('students');
		$UserNameDB = $query->result();
    
    return $UserNameDB;
	}

	public function getFinishedSubjects($id = null)
	{
	    $this->load->database();
	    if ($id) {
	      $subjects_done = $this->db->from('subject_done')->where('subject_id', $id)->get()->result();
	    } else {
	      $subjects_done = $this->db->get('subject_done')->result();
	    }
	    return $subjects_done;
	}    


}

?>