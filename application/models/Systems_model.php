<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 13-6-30
 * Time: 下午12:59
 * To change this template use File | Settings | File Templates.
 */

class Systems_model extends  MY_Model{

    public  function __construct(){
        parent::__construct("Systems_model");
    }

    public function test(){
        $query = $this->db->query("select name from test where id>1");
        $result = $query->row_array();

    }
}