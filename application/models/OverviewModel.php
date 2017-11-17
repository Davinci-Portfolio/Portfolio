<?php
class OverviewModel extends CI_model 
{
    
    public function getStudents($studentId = null) {
        $this->load->database();
        if ($studentId) {
            $this->db->where('ov_number', $studentId);
        }
        $getStudents = $this->db->get('students');
        $students = $getStudents->result();

        return $students;
    }

    public function getAssignments($studentId = null, $assignmentId = null) {
        $this->load->database();
        if ($assignmentId) {
            $this->db->where('id', $assignmentId);
        }
        if ($studentId) {
            $this->db->join('subject_done', 'subject_done.subject_id = subjects.id', 'left outer');
            $this->db->where('subject_done.ov_number', $studentId);
        }
        $getAssignments = $this->db->get('subjects');
        $assignments = $getAssignments->result();

        return $assignments;
    }

    public function getAssignmentsQuestionsAnswers($subject_id) {

        $this->load->database();
        $this->db->join('answers', 'answers.question_id = questions.id', 'left outer');
        $this->db->where('questions.subject_id', $subject_id);
        $questionsAndAnswers = $this->db->get('questions')->result();
        return $questionsAndAnswers;
        // foreach ($questionsAndAnswers as $questionAndAnswer) {
        //     if ($questionAndAnswer->answer == '') {
        //         $questionAndAnswer->answer = 'The user did not answer correctly!';
        //         $questionAndAnswer->wrong = 'X';
        //     } else {
        //         $questionAndAnswer->wrong = '';
        //     }
        // }
    }

}
