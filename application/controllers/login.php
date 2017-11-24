<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel');
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
      'cohort' => null,
      'logged_in' => false
    ];

    $checkAdmin = '1';
    $students = $this->LoginModel->getUserData($userdata['username']); // data van de db

    if ($students) {
      if ($userdata['username'] === $students[0]->name && $userdata['password'] === $students[0]->wachtwoord) {

          $userdata['logged_in'] = true;
          $userdata['infoUsers'] = $students[0]->profile_img;
          $userdata['ov_number'] = $students[0]->ov_number;
          $userdata['cohort'] = $students[0]->cohort;

          $this->session->set_userdata($userdata);
        if ($checkAdmin == $students[0]->admin) { //check if admin is loggedin      
          
          $userdata['auth'] = "admin"; 

          $this->session->set_userdata($userdata);
          return redirect('Overview/index'); 
        }
        $userdata['auth'] = "user";

        $this->session->set_userdata($userdata);
        return redirect('questionnaires/index');
      } 
    }
    $errorMessage = "Verkeerde gebruikersnaam of wachtwoord";
    $this->index($errorMessage);       
  }

  public function userLogout()
  {
    $userdata = ['username','password','auth','logged_in', 'infoUsers'];
    $this->session->unset_userdata($userdata);
    redirect('');
    exit;
  }

}