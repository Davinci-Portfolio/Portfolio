<?php
class UploadModel extends CI_Model {

    public function uploadFunction()
    {
            parent::__construct();
    }

    public function csvData($csvData)
    {   
        $this->load->database();
        $data = [
            'name' => $csvData['Naam'],
            'ov_number' => $csvData['OV Nummer'],
            'klas' => $csvData['Klas']
        ];
        $this->db->insert('students', $data);      
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