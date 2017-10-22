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
	}

	public function index()
	{
		$data['infoUsers'] = $this->userInfoModel->getUserInfo();
    $data['fileNameView'] = 'userInfo';
		crender('index', $data);
	}

}