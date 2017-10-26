<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	function __construct()
  {
    parent::__construct();
    $this->load->model('loginModel');
    $this->load->library('session'); 
  }
  
  public function index()
  {
    $data['error'] = $this->Login->$errorMessage; 
    var_dump($errorMessage);

    var_dump($data);
    loginRender('index', $data);
  }

  public function Login()
  { 

    $errorMessage = '';
    $userdata = [
      'username' => $_POST['Username'],
      'password' => $_POST['Password'],
      'infoUsers' => null,
      'auth' => null,
      'logged_in' => false
    ];
             
    $checkAdmin = '1';
    $students = $this->loginModel->getUserData($userdata['username']); // data van de db

    if ($userdata['username'] == $students[0]->name && $userdata['password'] == $students[0]->wachtwoord) {

        $userdata['logged_in'] = true;
        $userdata['infoUsers'] = $students[0]->profile_img;

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
    } elseif ($userdata['username'] != $students[0]->name) {
      $errorMessage = "Verkeerde username";
      $this->index($errorMessage); 
      redirect('');
      exit;

    } elseif ($userdata['password'] != $students[0]->wachtwoord){
      
      $this->index->$errorMessage = "Verkeerd Wachtwoord";
      redirect('');
      exit;

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