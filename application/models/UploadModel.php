<?php
class UploadModel extends CI_Model {

    public function uploadFunction()
    {
            parent::__construct();
    }

    public function insertFileName($fileData)
    {   
        $this->load->database();
        foreach ($fileData as $fileData) {
            $data = [
                'name' => $fileData['name'],
                'ov_number' => $fileData['ov_number'],
                'klas' => $fileData['klas']
            ];
            $this->db->insert('students', $data);   
        }     
    }

    public function uploadAnswers($fileData)
    {
       $this->load->database();
        $data = [
            'subject_id' => $fileData['subject_id'],
            'question_id' => $fileData['question_id'],
            'student_id' => $fileData['student_id'],
            'answer' => $fileData['answer'],
            'date' => date("d-m-Y")
        ];
        $this->db-insert('answers', $data);
    }
}
?>