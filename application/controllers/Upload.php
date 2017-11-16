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
    $this->load->library('CSVReader');
  }

  public function index($error = null)
  {
    crender('index', array('error' => $error));
  }

  public function readCsv($fileName) {
    // array(1) { ["﻿OV nummer"]=> string(16) "99034334" } 
    $handle = fopen(base_url() . 'uploads/' . $fileName,'r');
    $row = 1;
    $new_data = [];
    while ( ($data = fgetcsv($handle) ) !== false ) {
       $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
            $new_data[] = $data[$c];
        }
    }

    foreach ($new_data as $key => $value) {
      $str = explode(';', $value);
      var_dump($new_data);die;

    }
  }

  public function uploadFile() 
  { 
    $row = [];
    $config['upload_path']   = 'uploads/'; 
    $config['allowed_types'] = 'csv|xls|xlsx|xml'; 
    $config['max_size']      = 10000; 

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
      $error = array('error' => $this->upload->display_errors());
      redirect('upload/index', $error); 
    }
   
    $fileName = $this->upload->data('file_name');
    $data = $this->upload->data();
    $file = fopen('./uploads/' . $this->upload->data('file_name'),"r");	

    $csvData = $this->readCsv($fileName);
    
    $this->UploadModel->csvData($csvData);

    $this->load->view('upload', $data);
    //redirect('Overview/index');        
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
