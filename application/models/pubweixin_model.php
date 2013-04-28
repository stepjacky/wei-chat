<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements.  See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License.  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * FileName application/models/pubweixin.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Pubweixin_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Pubweixin_model");
    }  


    public function get_token($oid){
        $this->db->select("token");
        $this->db->where("weixin_id",$oid);
        $query = $this->db->get($this->table());
        $result = $query->first_row('array');
        return $result['token'];
    }

    public function saveUpdate($data,$pk='weixin_id'){
        parent::saveUpdate($data,$pk,FALSE);
    }

    public function save2($data)
    {

        $tdata = array_merge($data,array(
            "token"=>create_random_string(5),
            'desturl'=>base_url("/message/index/".strtr($data['weixin_id'],array("_"=>"at")))
        ));

        parent::save2($tdata,FALSE);

    }

    public function connector($oid){
        $this->db->select("desturl,token");
        $this->db->where('weixin_id',$oid);
        $query = $this->db->get($this->table());
        $result = $query->first_row('array');
        return $result;
    }

    
}   