<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    //apparea
    public function index()
    {
        $data = array("flag" => "index");
        $this->__user_header($data);

        $this->load->view("index/index", $data);

        $this->load->view("front/footer");
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
/* Location: ./application/controllers/welcome.php */