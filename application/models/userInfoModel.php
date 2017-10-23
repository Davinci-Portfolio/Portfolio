<?php
class userInfoModel extends CI_model
{

	public function getUserInfo()
  {
    $this->load->database();
    $userInfo = $this->db->get('students')->result();
    
    return $userInfo;
  }  

  public function incertProfileImgPath($name, $Post)
  {
  	$this->load->database();
		$this->db->set('profile_img', $Post['file_name']);
    $this->db->where('name', $name);
    $this->db->update('students');
  }
}