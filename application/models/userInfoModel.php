<?php
class userInfoModel extends CI_model
{

	public function getUserInfo($userName)
  {
    $this->load->database();
    if ($userName) {
      $userInfo = $this->db->from('students')->where('name', $userName)->get()->result();
    } else {
      $userInfo = $this->db->get('students')->result();
    }
    return $userInfo;
  }  

  public function incertProfileImgPath($name, $imgInfo)
  {
  	$this->load->database();
		$this->db->set('profile_img', $imgInfo['file_name']);
    $this->db->where('name', $name);
    $this->db->update('students');
  }
}