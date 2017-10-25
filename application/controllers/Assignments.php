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
		$data['subjects'] = $this->AssignmentsModel->getSubjects('');
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

	public function studentAnswers($subject_id)
	{
		$data['getAnswers'] = $this->AssignmentsModel->getAnswers($subject_id);
		$data['getQuestions'] = $this->AssignmentsModel->getAssignments($subject_id);
		$data['doneSubjects'] = $this->AssignmentsModel->getFinishedSubjects($subject_id);
		$data['subjects'] = $this->AssignmentsModel->getSubjects($subject_id);
		$data['fileNameView'] = 'studentAnswers';
		crender('index', $data);
	}

	public function uploadComment()
	{
		$StudentId = $_POST['subject_id'];
		$Comment = $_POST['comment'];
		$Username = $_POST['username'];
		$dataArray = [
			'comment' => $Comment, 
			'username' => $Username
		];
		$this->AssignmentsModel->insertComment($dataArray, $StudentId);
		redirect('Assignments/studentAnswers/' . $StudentId);
	}

	public function formPage($btnElement, $id = null)
	{
		$this->load->helper('form');
		if ($id !== null) {
			$data['editData'] = $this->AssignmentsModel->getSubjects($id);
		} else {
			$data['editData'] = '';
		}
		$data['fileNameView'] = 'assignments/formPage';
		$data['JSFileNames'] = ['public/custom/js/formPage.js'];
		$data['students'] = $this->AssignmentsModel->getStudents();
		$data['topics'] = $this->AssignmentsModel->getTopic();

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
		$dataFormTopic = $_POST['topic'];
		$dataFormInput = $_POST['question'];
		$dataFormCohort = $_POST['cohort'];
		$dataSubjects = [
			'subject' => $dataFormTitle,
			'subtopic' => $dataFormTopic,
			'cohort' => $dataFormCohort
		];
		$this->AssignmentsModel->insertData($dataSubjects, $dataFormInput);
		//redirect('Assignments/index');
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