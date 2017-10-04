<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        parent::loginCheck();
        parent::checkForbiddenUser();
        $this->load->model('fileModel');
    }

    //START INDEXES
    public function index()
    {
        $data['imports'] = $this->fileModel->getFiles();
        $data['fileNameView'] = 'Files/Files';
        crender('index', $data);
    }
    
    public function FileHistory()
    {
        $data['imports'] = $this->fileModel->getInactiveFiles();
        $data['fileNameView'] = 'Files/FileHistory';
        crender('index', $data);
    }
    //END INDEXES

    //CRUD FUNCTIONS START
    public function setInactive($id)
    {
        $this->fileModel->setInactive($id);
    }

    public function deleteFile($id)
    {
        $this->fileModel->deleteFile($id);
    }

    public function setActive($id)
    {
        $this->fileModel->setActive($id);
    }
    //CRUD FUNCTIONS END

}
