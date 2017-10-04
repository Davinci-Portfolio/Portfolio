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
        if ($this->session->auth == 'admin') {
            redirect('Overview/index');
        } elseif ($this->session->auth == 'user') {
            redirect('questionnaires/index');
        }
        loginRender('index');
    }

    public function Login()
    { 
        // wat de gebruiker heeft ingevuld 
        $userdata = [
            'username' => $_POST['Username'],
            'password' => $_POST['Password'],
            'auth' => null,
            'logged_in' => false
        ];
        $checkAdmin = '1';
        $data = $this->loginModel->getUserData($userdata['username']); // data van de db
        
        if ($userdata['username'] == $data[0]->name && $userdata['password'] == $data[0]->wachtwoord) {
           
            $userdata['logged_in'] = true;
            $this->session->set_userdata($userdata);

            if ($checkAdmin == $data[0]->admin) { //check if admin is loggedin
               
                $userdata['auth'] = "admin";
                $this->session->set_userdata($userdata);
                redirect('Overview/index'); 

            } else { //check if normal user is loggedin
                
                $userdata['auth'] = "user";
                $this->session->set_userdata($userdata);
                redirect('questionnaires/index');

            }

        } elseif ($userdata['username'] != $data[0]->name) {
            return "Verkeerde gebruikers gegevens";
            exit;
            // error = .... 
            // $this->view ..... login
        } elseif ($userdata['password'] != $data[0]->ov_number){
            echo "Verkeerde wachtwoord gegevens";
            exit;
        }
             
    }

    public function userLogout()
    {
        $userdata = ['username','password','auth','logged_in'];
        $this->session->unset_userdata($userdata);
        redirect('');
        exit;
    }

}