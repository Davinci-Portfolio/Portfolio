<?php
class AssignmentsModel extends CI_model
{

    public function getStudentCohort()
    {
        $this->load->database();
        $query = $this->db->get('students');
        $students = $query->result();
        return $students;
    }
    
    public function getSubjects()
    {
        $this->load->database();
        $getSubjects = $this->db->get('subjects');
        $subjects = $getSubjects->result();
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

    public function getSubjectsQuestionnaires($id = null)
    {
        $this->load->database();
        if ($id) {
            $this->db->where('id', $id);
        }
        $this->db->where('display', 1);
        $getSubjects = $this->db->get('subjects');
        $subjects = $getSubjects->result();

        return $subjects;
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

    public function insertQuizAnswers($answer)
    {
        $dataArray = array(
            'subject_id' => $answer['subjectId'],
            'question_id' => $answer['questionId'],
            'answer' => $answer['answer'],
            'date' => date('d-m-Y')
        );
        $this->load->database();
        $this->db->insert('answers', $dataArray);
    }

    public function getAssignments($id)
    {
        $this->load->database();
        $this->db->where('questions.subject_id', $id);
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

    public function getTopics()
    {
        $this->load->database();
        $query = $this->db->get('Topics');
        $Topics= $query->result();
        return $Topics;

    }

}
