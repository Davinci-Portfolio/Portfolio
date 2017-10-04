<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	*$fileNameView is needed when you link to other file of your project but you want to keep the css and js files.
*/
class Assignments extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		parent::loginCheck();
		parent::checkForbiddenUser();
		$this->load->model('AssignmentsModel');
	}

	public function index()
	{
		$data['subjects'] = $this->AssignmentsModel->getSubjects();
    	$data['fileNameView'] = 'assignments/overviewAssignments';
    	$data['students'] = $this->AssignmentsModel->getStudents();
		crender('formPage', $data);
	}

	public function handedInSubjects()
	{
		$data['doneSubjects'] = $this->AssignmentsModel->getFinishedSubjects();
		$data['fileNameView'] = 'handedInSubjects';
		crender('index', $data);
	}

	public function studentAnswers($studentId)
	{
		//$data['doneSubjects'] = $this->AssignmentsModel->getFinishedSubjects();
		$data['getAnswers'] = $this->AssignmentsModel->getAnswers($studentId);
		$data['fileNameView'] = 'studentAnswers';
		crender('index', $data);
	}

	public function uploadComment()
	{
		$Comment = $_POST['comment'];
		$StudentId = $_POST['studentId'];
		$this->AssignmentsModel->insertComment($Comment, $StudentId);
		redirect('Assignments/handedInSubjects');
	}

	public function formPage($btnElement, $id = null)
	{
		if ($id !== null) {
			$data['editData'] = $this->AssignmentsModel->getSubjects($id);
		} else {
			$data['editData'] = '';
		}
		$data['fileNameView'] = 'assignments/formPage';
		$data['JSFileNames'] = ['public/custom/js/formPage.js'];
		$data['students'] = $this->AssignmentsModel->getStudents();
		crender('index', $data);
	}

	public function overviewSubjectAssignments($id = null)
	{
		$data['questions'] = $this->AssignmentsModel->getAssignments($id);
		$data['topicId'] = $id;
    	$data['fileNameView'] = 'assignments/overviewSubjectAssignments';
		crender('index', $data);
	}

	public function sendDataForm()
	{
		$dataFormTitle = $_POST['title'];
		$dataFormSubtopic = $_POST['subtopic'];
		$dataFormInput = $_POST['question'];
		$dataFormCohort = $_POST['cohort'];
		$dataSubjects = [
			'subject' => $dataFormTitle,
			'subtopic' => $dataFormSubtopic,
			'cohort' => $dataFormCohort
		];
		$this->AssignmentsModel->insertData($dataSubjects, $dataFormInput);
	}

	public function updateData()
	{
		$newQuestionVal = $_POST['newQuestionVal'];
		$questionId = $_POST['questionId'];
		if ($newQuestionVal !== '') {
			$this->AssignmentsModel->updateData($newQuestionVal, $questionId);
		}
	}

	public function deleteQuestion()
	{
		$questionId = $_POST['questionId'];
		$this->AssignmentsModel->deleteQuestion($questionId);
	}

	public function addNewQuestion()
	{
		$topicId = $_POST['topicId'];
		$newQuestionText = $_POST['newQuestionText'];
		if ($newQuestionText !== '') {
			$this->AssignmentsModel->addNewQuestion($topicId, $newQuestionText);
		}
	}
	public function changeDisplay()
	{
		$topicId = $_POST['topicId'];
		$displayBtn = $_POST['displayBtn'];
		$newDisplayedBtn = ($displayBtn == 'closeBtn' ? 1 : 0);
		$this->AssignmentsModel->changeDisplaySubject($topicId, $newDisplayedBtn);
	}

}