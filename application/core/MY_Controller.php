 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('session');

        // load custom helpers
        $this->load->helper('view');

        $CI =& get_instance();
        $CI->basic();
    }
    public function basic(){}

    public function loginCheck()
    {
        // check user login
        if ($this->session) {
            if ($this->session->auth === 'user' || $this->session->auth === 'admin' ) {
            } else {
                redirect('');
            }
        }
    }

    public function checkForbiddenUser()
    {
        if ($this->session->auth == 'user'){
            redirect('questionnaires/index');
        } 
    } 
}
