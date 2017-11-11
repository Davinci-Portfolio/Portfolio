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
		$username = $_POST['username'];
		// $Questions = $_POST['answer' . ];
		// foreach questions as question {
		// 	$answer = $_POST['answer' . question.id];		
		// }

		$questions = [];
		$test = $this->input->post();
    $questionId = $_POST['questionId'];
		var_dump($test); die;
		
		$answers = [];
		foreach($answers as $answer){
			$answer = $this->input->post();
			array_push($answers, $answer); 
			var_dump($answer[$questionId]);
		}
    $subjectId = $_POST['subjectId'];
    $subjectName = $_POST['subject'];
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
		var_dump($dataArrayQuiz);die;
		
		$this->AssignmentsModel->setFinishedTopic($dataArrayTopic);
		$this->AssignmentsModel->insertQuizAnswers($dataArrayQuiz);	
		redirect('questionnaires/index');
	}
}