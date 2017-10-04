<?php
class UploadModel extends CI_Model {

    public function uploadFunction()
    {
            parent::__construct();
            Your own constructor code
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

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'csv|gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
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
}
?>