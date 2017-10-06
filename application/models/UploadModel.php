<?php
class UploadModel extends CI_Model {

    public function uploadFunction()
    {
            parent::__construct();
    }

    public function insertFileName($fileData)
    {        
    	$this->load->database();
		$data = [
			'filename' => $fileData['file_name'],
			'file_size' => $fileData['file_size'],
			'file_date' => date("d-m-Y"),
			'file_active' => 1
		];
        $this->db->insert('imports', $data);
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