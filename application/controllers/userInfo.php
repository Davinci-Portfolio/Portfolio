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
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['infoUsers'] = $this->userInfoModel->getUserInfo();
    $data['fileNameView'] = 'userInfo';
		crender('index', $data);
	}

	public function do_upload()
  {
  	// $answers = $this->input->post();

    $config['upload_path'] = './user_guide/_images';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = 2048;
    $config['max_width'] = 2048;
    $config['max_height'] = 2048;
		//var_dump($config);die();
    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile')) {
    }
    else {
      $data = array('upload_data' => $this->upload->data());
     	redirect('userInfo/index');
    }
  }

}