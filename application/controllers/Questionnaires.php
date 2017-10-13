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
		$data['subjects'] = $this->AssignmentsModel->getSubjects();
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
		$answerArray = [];
        $answers = $this->input->post();
        foreach ($answers as $key => $answer) {
        	if ($key !== 'answers_length') {
	        	if ($answer === "ja" || $answer === "nee" || $answer === "misschien") {
	        		redirect('questionnaires/index');
	        	} else {
	        		$answersArray[] = [
	        			'subjectId' => $answers['subjectId'],
	        			'questionId' => $key,
	        			'answer' => $answer
	        		];
	        	}
        	}
		}
		unset($answersArray[0]);
		foreach($answersArray as $answer) {
			$this->AssignmentsModel->insertQuizAnswers($answer);	
		}
	}
}