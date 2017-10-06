<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        parent::loginCheck();
        parent::checkForbiddenUser();
        $this->load->helper(array('form', 'url'));
        $this->load->model('UploadModel');
    }

    public function index($error = null)
    {
		  crender('index', array('error' => ''));
    }

    public function uploadFile() 
    { 
      $row = [];
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'csv|xls|xlsx|xml'; 
         $config['max_size']      = 10000; 

         $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            redirect('upload/index', $error); 
        }

        $this->UploadModel->insertFileName($this->upload->data());
        $data = $this->upload->data();
        $file = fopen('./uploads/' . $this->upload->data('file_name'),"r");	
        // $file = fopen($data['full_path'], 'r');
        $header = fgetcsv($file);
        while ($row = fgetcsv($file)) {
          $arr = array();
          foreach ($header as $i => $col)
            $arr[$col] = $row[$i];
            $row[] = $arr;
        }
		  
        var_dump($row);die();


        //$this->load->model('StudentModel');
        //$this->StudentModel->insertEntry('test','test');


       	redirect('files/index');
        
      } 

  	public function getAnswers($data) 
    {

  		return $data;
  	}

    public function sendAnswers() 
    {
        $realAnswer = null;
        if ($_POST['answer'] === 'ja' || $_POST['answer'] === 'nee' || $_POST['answer'] === 'misschien') {
            $realAnswer = 0;
        } else {
            $realAnswer = 1;
        }
        $this->UploadModel->uploadAnswers();

        $data = $this->upload->data();
        $this->upload->data('subject_id');
    }

}
