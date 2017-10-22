<?php
class userInfoModel extends CI_model
{

	public function getUserInfo()
  {
    $this->load->database();
    $userInfo = $this->db->get('students')->result();
    
    return $userInfo;
  }  

  public function uploadImg()
  {
  	$this->load->database();
  }
}