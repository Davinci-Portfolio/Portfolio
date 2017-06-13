<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	*$PHPfileName is needed when you link to other file of your project but you want to keep the css and js files.
*/
class Assignments extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('session');
		$this->load->model('AssignmentsModel');
		$data['subjects'] = $this->AssignmentsModel->getSubjects();
        $data['PHPfileName'] = 'assignments/overviewAssignments';
		crender('index', $data);
	}

	public function formPage($btnElement, $id = null)
	{
		$this->load->model('AssignmentsModel');
		if ($id !== null) {
			$data['editData'] = $this->AssignmentsModel->getSubjects($id);
		} else {
			$data['editData'] = '';
		}
		$data['PHPfileName'] = 'assignments/formPage';
		$data['JSFileName'] = 'formPage';

		crender('index', $data);
	}

	public function overviewAssignmentsSubject($id = null)
	{
		$this->load->library('session');
		$this->load->model('AssignmentsModel');
		//$data['subjects'] = $this->AssignmentsModel->getSubjects();
        $data['PHPfileName'] = 'assignments/overviewAssignmentsSubject';
		crender('index', $data);
	}

	public function sendDataForm() {
		$this->load->model('AssignmentsModel');
		$dataFormTitle = $_POST['title'];
		$dataFormSubtopic = $_POST['subtopic'];
		$dataFormInput = $_POST['question'];
		$dataSubjects = array(
			'subject' => $dataFormTitle,
			'subtopic' => $dataFormSubtopic
		);

		$data['done'] = $this->AssignmentsModel->insertData($dataSubjects, $dataFormInput);
		echo json_encode($data['done']);
	}
}
