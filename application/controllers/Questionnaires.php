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
		
		$post = $this->input->post();
		$subjects = $this->input->post(['subjectId']);
		$post_length = count($post);
	
		print_r($subjects);

		$questions = [];

		for ($i=1; $i <= (int)$subjects; $i++)
		{
			array_push($questions, $post[$i]);
		}

		print_r($questions);

		die;
    $questionId = $_POST['questionId'];
		
		$answers = [];
		foreach($answers as $answer){
			$answer = $this->input->post();
			array_push($answers, $answer); 
			var_dump($answer[$questionId]);
		}
   die;
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