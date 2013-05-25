<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 13-5-24
 * Time: 下午3:27
 * To change this template use File | Settings | File Templates.
 */

class Systems extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }


    public function accesserror(){
        $this->load->view('front/header');
        $this->load->view('systems/accesserror');
        $this->load->view('front/footer');
    }

}