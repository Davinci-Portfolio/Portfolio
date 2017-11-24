<?php
class LoginModel extends CI_Model
{
	
	public function getUserData($userName){
		$this->load->database();
		$result = $this->db->where('name', $userName)->get('students')->result();
		
    return $result;
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