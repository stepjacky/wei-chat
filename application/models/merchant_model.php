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
 * FileName application/models/merchant.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Merchant_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Merchant_model");
    }


    public function login($username,$password){

        $this->db->where('id', $username);
        $this->db->where('pword', $password);
        $query = $this->db->get($this->table());
        $user =  $query->first_row('array');
        if(empty($user)) return FALSE;
        return $user;

    }

    public function register($data){
        $this->firelog("注册信息:");
        $this->firelog($data);
        $bean =  $this->get($data['id']);
        $this->firelog($bean);
        if(!$bean['empty'])
            return FALSE;
        else{
            $this->save($data,"id",FALSE);
            return TRUE;
        }

    }
    
}   