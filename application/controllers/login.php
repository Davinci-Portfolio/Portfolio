<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends MY_Controller
{
	function __construct()
  {
    parent::__construct();
    $this->load->model('loginModel');
    $this->load->library('session'); 
  }
  
  public function index($errorMessage = NULL)
  {
    if ($errorMessage) {
      $data['error'] = $errorMessage;
      loginRender('', $data);
    } else {
      $data['error'] = '';
      loginRender('index', $data);
    }
  }

  public function loginCheck()
  {
    $userdata = [
      'username' => $_POST['Username'],
      'password' => $_POST['Password'],
      'ov_number' => null,
      'infoUsers' => null,
      'auth' => null,
      'logged_in' => false
    ];

    $checkAdmin = '1';
    $students = $this->loginModel->getUserData($userdata['username']); // data van de db

    if ($userdata['username'] == @$students[0]->name && $userdata['password'] == @$students[0]->wachtwoord) {

        $userdata['logged_in'] = true;
        $userdata['infoUsers'] = $students[0]->profile_img;
        $userdata['ov_number'] = $students[0]->ov_number;

        $this->session->set_userdata($userdata);
      if ($checkAdmin == $students[0]->admin) { //check if admin is loggedin      
        
        $userdata['auth'] = "admin"; 

        $this->session->set_userdata($userdata);
        redirect('Overview/index'); 
      } else { //check if normal user is loggedin
        
        $userdata['auth'] = "user";

        $this->session->set_userdata($userdata);
        redirect('questionnaires/index');
      }
    } else {
      $errorMessage = "Verkeerde gebruikersnaam of wachtwoord";
      $this->index($errorMessage); 
    }
           
  }

  public function userLogout()
  {
    $userdata = ['username','password','auth','logged_in', 'infoUsers'];
    $this->session->unset_userdata($userdata);
    redirect('');
    exit;
  }

}