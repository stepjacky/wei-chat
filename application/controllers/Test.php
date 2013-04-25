<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 13-4-25
 * Time: 下午10:53
 * To change this template use File | Settings | File Templates.
 */

class Test extends Picture_Controller {

    public  function __construct(){
        parent::__construct("Userpicture_model");
    }

    public function index($id=FALSE){
        $data = $this->dao->get($id);
        $this->load->view("admin/header-pure");
        $this->load->view($this->dao->table()."/test",$data);
        $this->load->view("admin/footer-pure");
    }
}