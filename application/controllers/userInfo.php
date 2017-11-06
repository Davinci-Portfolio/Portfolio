<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
  *$fileNameView is needed when you link to other file of your project but you want to keep the css and js files.
*/
class userInfo extends MY_Controller {

  function __construct()
  {
    parent::__construct();
    parent::loginCheck();
    $this->load->model('userInfoModel');
    $this->load->library('session'); 
    $this->load->helper(array('form', 'url'));
  }

  public function index()
  {
    $name = $_SESSION['username'];
    $data['infoUsers'] = $this->userInfoModel->getUserInfo($name);
    $data['fileNameView'] = 'userInfo';
    crender('index', $data);
  }

  // public function deleteFiles(){
  //   $files = glob($path.'*'); // get all file names
  //   foreach($files as $file){ // iterate files
  //     if(is_file($file))
  //        // delete file
  //       //echo $file.'file deleted';
  //   }   
  // }

  public function do_upload()
  {
    $userName = $_SESSION['username'];
    $oldImgName = $this->userInfoModel->getOldImg($userName);
    $config['upload_path'] = './public/adminLTE/img/';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = 2048;
    $config['max_width'] = 2048;
    $config['max_height'] = 2048;
    $this->load->library('upload', $config);
    unlink($config['upload_path'] . $oldImgName); // remove old picture

    if ($this->upload->do_upload('userfile')) {
      $this->userInfoModel->incertProfileImg($userName, $this->upload->data());
      $userImg = $this->upload->data();
      $data['user'] = $this->uri->segment(1);
      $sessionData = array('infoUsers' => $userImg['file_name']);   
      $this->session->set_userdata($sessionData);
      redirect('userInfo/index');
    }
    else {}
  }
}