<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sysadmin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function submited()
    {
       $this->load->view("common/result-close");
    }

    public function changelang($lang){

        $this->nsession->set_userdata('locale',$lang);
        $this->config->set_item('language', $lang);
        $this->load->helper('language');
        $this->lang->load($lang);
        redirect();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/sysadmin.php */