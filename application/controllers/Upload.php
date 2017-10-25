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
    crender('index', array('error' => ''));
  }

  public function readCsv($fileName) {
    return $data['csvData'] = $this->csvreader->parse_file(base_url() . 'uploads/' . $fileName);
  }

  public function uploadFile() 
  { 
    $csvData = $_POST['csvdata'];
    
    $row = [];
    $config['upload_path']   = './uploads/'; 
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
    $this->UploadModel->insertFileName($csvData);
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
