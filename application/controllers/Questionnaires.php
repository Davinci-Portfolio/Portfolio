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
	    $this->load->model('OverviewModel');
    }

	public function index()
	{
		$data['subjects'] = $this->AssignmentsModel->getSubjectsQuestionnaires();
		$data['doneSubjects'] = $this->AssignmentsModel->getFinishedSubjects();
    $data['fileNameView'] = 'questionnaires/overviewQuestionnaires';
		crender('index', $data);
	}

	public function overviewQuiz($id = null)
	{
		$data['questions'] = $this->AssignmentsModel->getAssignments($id);
		$data['subjects'] = $this->AssignmentsModel->getSubjects($id);
   	$data['fileNameView'] = 'questionnaires/quiz';
		crender('index', $data);
	}

	public function overviewQuestionsAnswers($subjectId = null)
	{
		$data['subjects'] = $this->AssignmentsModel->getSubjects($subjectId);
		$data['subjectsDone'] = $this->AssignmentsModel->getFinishedSubjects($subjectId);
		$data['questionAnswers'] = $this->OverviewModel->getAssignmentsQuestionsAnswers($subjectId);
		$data['fileNameView'] = 'questionnaires/overviewQuestionsAnswers';
		crender('index', $data);
	}

	public function sendQuizAnswers()
	{
	 	$subjectId = $_POST['subjectId'];
	 	$getQuestions = $this->AssignmentsModel->getAssignments($subjectId);
 		$answers = [];
 		$questionIds = [];
		foreach ($getQuestions as $getQuestion) {
			$answer = $_POST[$getQuestion->id];	
			$questionId = $getQuestion->id;	
			array_push($answers, $answer);
			array_push($questionIds, $questionId);
		}
    $username = $_POST['username'];
    $subjectName = $_POST['subject']; 
		$dataArrayTopic = [
			'subjectId' => $subjectId,
			'username' => $username,
			'subjectName' => $subjectName
		];
		$dataArrayQuiz = [
			'answers' => $answers,
			'subjectId' => $subjectId,
			'questionId' => $questionIds
			// OV => $ov
		];
	
		$this->AssignmentsModel->setFinishedTopic($dataArrayTopic);
		$this->AssignmentsModel->insertQuizAnswers($dataArrayQuiz);	
		redirect('questionnaires/index');
	}
}