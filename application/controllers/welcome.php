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

        $this->load->view("front/header");

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

    public function bizlogin(){

        $this->load->view('admin/header');
        $this->load->view("admin/bizlogin");
        $this->load->view("admin/footer");
    }

    public function start_register(){
        $this->load->helper('captcha');
        $word = create_random_string(5);
        $vals = array(
            'img_path' => './resources/images/uploads/',
            'img_url' => '/resources/images/uploads/',
            'img_width' => 150,
            'img_height' => 30,
            'word'=> $word,
            'expiration' => 7200
        );
        $this->fireLog($vals);
        $cap = create_captcha($vals);
        $this->nsession->set_userdata("capword",$word);
        $this->load->view('admin/header');
        $this->load->view("admin/bizregister",$cap);
        $this->load->view("admin/footer");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */