<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 13-3-25
 * Time: 上午11:15
 * To change this template use File | Settings | File Templates.
 */
class LangClass extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('nsession');

    }



    function set_lang() {
        $my_lang = $this->nsession->userdata('locale');
        if (!$my_lang && isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $my_lang =  strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5));
            $this->nsession->set_userdata('locale',$my_lang);
        }

        $this->config->set_item('language',$my_lang);
        $this->load->helper('language');
        $this->lang->load($my_lang);

    }

}