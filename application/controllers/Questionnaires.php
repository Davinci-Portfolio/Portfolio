<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	*$fileNameView is needed when you link to other file of your project but you want to keep the css and js files.
*/
class questionnaires extends MY_Controller {
    
    function __construct()
    {
	    parent::__construct();
	    parent::loginCheck();
	    $this->load->model('AssignmentsModel');
    }

	public function index()
	{
		$data['subjects'] = $this->AssignmentsModel->getSubjectsQuestionnaires('');
		$data['doneSubjects'] = $this->AssignmentsModel->getFinishedSubjects('');
    $data['fileNameView'] = 'questionnaires/overviewQuestionnaires';
		crender('index', $data);
	}

	public function overviewQuiz($id = null)
	{
		$data['questions'] = $this->AssignmentsModel->getAssignments($id);
		$data['subjects'] = $this->AssignmentsModel->getSubjects($id);
   	$data['fileNameView'] = 'Questionnaires/quiz';
		crender('index', $data);
	}

	public function overviewQuestionsAnswers($id = null)
	{
		$data['subjects'] = $this->AssignmentsModel->getSubjects($id);
		$data['subjectsDone'] = $this->AssignmentsModel->getFinishedSubjects($id);
		$data['questions'] = $this->AssignmentsModel->getAssignments($id);
		$data['answers'] = $this->AssignmentsModel->getAnswers($id);
		$data['fileNameView'] = 'questionnaires/overviewQuestionsAnswers';
		crender('index', $data);
	}

	public function sendQuizAnswers()
	{

		// $profile = [];
		// $answers = $this->input->post();
		// foreach($answers as $answer){
		// 	array_push($profile, $answer);
		// }
		// var_dump($profile);die();
		$username = $_POST['username'];
    $answer = $_POST['answer'];
    $subjectId = $_POST['subjectId'];
    $subjectName = $_POST['subject'];
    $questionId = $_POST['questionId'];
		$dataArrayTopic = [
			'subjectId' => $subjectId,
			'username' => $username,
			'subjectName' => $subjectName
		];
		$dataArrayQuiz = [
			'answer' => $answer,
			'subjectId' => $subjectId,
			'questionId' => $questionId
		];
		
		$this->AssignmentsModel->setFinishedTopic($dataArrayTopic);
		$this->AssignmentsModel->insertQuizAnswers($dataArrayQuiz);	
		redirect('questionnaires/index');
	}
}