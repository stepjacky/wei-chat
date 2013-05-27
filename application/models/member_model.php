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
 * FileName application/models/member.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Member_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Member_model");
    }

    public function add_user($data){
       /* $data = array(
            'pubweixin_id' => $pubwx ,
            'weixin' => $weixin
        );*/
        $SQL="insert into `%s` (`id`,`pubweixin_id`,`weixin`) values('%s','%s','%s')";
        $this->db->query(sprintf($SQL,$this->table(),getGUID(),$data['pubweixin_id'],$data['weixin']));
    }
    
}   