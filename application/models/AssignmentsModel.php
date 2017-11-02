<?php
class AssignmentsModel extends CI_model
{

    public function getTopic(){
        $this->load->database();
        $query = $this->db->get('topics');
        $topics = $query->result();
        return $topics;
    }

    public function getSubjects($subject_id)
    {
        $this->load->database();
        if ($subject_id) {
          $getSubjects = $this->db->from('subjects')->where('subject_id', $subject_id)->get();
          $subjects = $getSubjects->result();
        } else {
          $getSubjects = $this->db->get('subjects');
          $subjects = $getSubjects->result();
        }
        foreach ($subjects as $subject) {
            $subject->display = ($subject->display == 1 ? 'open' : 'close');
            if ($subject->display_date == null) {
                $subject->display_date = '';
            } else {
                $subject->display_date = date("d-m-Y", strtotime($subject->display_date));
            }

        }

        return $subjects;
    }

    public function getSubjectsQuestionnaires()
    {
      $this->load->database();
      $query = $this->db->from('subjects')->where('display', 1)->get()->result();
      return $query;
    }

    public function getFinishedSubjects($id = null)
    {
        $this->load->database();
        if ($id) {
          $subjects_done = $this->db->from('subject_done')->where('subject_id', $id)->get()->result();
        } else {
          $subjects_done = $this->db->get('subject_done')->result();
        }
        return $subjects_done;
    }    

    public function getAnswers($subject_id)
    { 
        $this->load->database();
        $getAnswers = $this->db->from('answers')->where('subject_id', $subject_id)->get()->result();
        return($getAnswers);
    }

    public function insertComment($dataArray, $StudentId)
    {
        $this->load->database();
        $query = array (
          'edited_by' => $dataArray['username'],
          'Comment' => $dataArray['comment']
        );
        $this->db->set($query);
        $this->db->where('subject_id', $StudentId);
        $this->db->update('subject_done');
    }

    public function insertData($dataSubjects, $dataFormInputs)
    {
        $this->load->database();
        $this->db->insert('subjects', $dataSubjects);
        $lastId = $this->db->insert_id();

        foreach ($dataFormInputs as $question) {
            if ($question !== '') {
                $dataArray = array(
                    'question' => $question,
                    'subject_id' => $lastId
                );
                $this->load->database();
                $this->db->insert('questions', $dataArray);
            }
        }
    }    

    public function insertQuizAnswers($dataArrayQuiz)
    {
      $this->load->database();
      $query = array(
        'subject_id' => $dataArrayQuiz['subjectId'],
        'question_id' => $dataArrayQuiz['questionId'],
        'answer' => $dataArrayQuiz['answer'],
        'date' => date('d-m-Y')
      );
      $this->db->insert('answers', $query);
    }    

    public function setFinishedTopic($dataArrayTopic)
    {
      $this->load->database();
      $query = array(
        'name' => $dataArrayTopic['username'],
        'subject_id' => $dataArrayTopic['subjectId'],
        'subject' => $dataArrayTopic['subjectName'],
        'done' => ('Yes')
      );
      $this->db->insert('subject_done', $query);
    }

    public function getAssignments($subject_id)
    {
        $this->load->database();
        $this->db->where('questions.subject_id', $subject_id);
        $getAssignments = $this->db->get('questions');
        $assignments = $getAssignments->result();

        return $assignments;
    }

    public function updateData($newQuestionVal, $questionId)
    {
        $this->load->database();
        $this->db->set('question', $newQuestionVal);
        $this->db->where('id', $questionId);
        $this->db->update('questions');
    }

    public function deleteQuestion($questionId)
    {
        $this->load->database();
        $this->db->where('id', $questionId);
        $this->db->delete('questions');
    }

    public function addNewQuestion($topicId, $newQuestionText)
    {
        $data = [
            'subject_id' => $topicId,
            'question'  => $newQuestionText
        ];
        $this->load->database();
        $this->db->insert('questions', $data);
    }

    public function changeDisplaySubject($topicId, $newDisplayedBtn)
    {
        $this->load->database();
        $this->db->set('display', $newDisplayedBtn);
        $this->db->where('id', $topicId);
        $this->db->update('subjects');
    }
    
    public function getStudents(){
        $this->load->database();
        $query = $this->db->get('cohorts');
        $students = $query->result();
        return $students;
    }

}
