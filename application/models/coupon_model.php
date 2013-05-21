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
 * FileName application/models/coupon.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:08 CST 2013
 *    
 */

class Coupon_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Coupon_model");
        $this->load->model("Couponcatalog_model","cdao");
    }

    public function check_daily_limit($cid){
        $SQL="select (count(c.id)-p.daily_limit) num from %s c,%s p
              where c.catalog_id='%s' and datediff(current_date,c.firedate)=0
              and p.id='%s'
              ";
        $query = $this->db->query(sprintf($SQL,array($this->table(),$this->cdao->table(),$cid,$cid)));
        $result = $query->row_array();

        return empty($result)?true:$result['num']<0;
    }

    public function check_user_daily_limit($cid,$weixin){
        $SQL="select (count(c.id)-p.user_daily_limit) num  from %s c , %s p
              where c.catalog_id='%s' and c.member_id='%s'
              and p.id='%s'
        ";
        $query = $this->db->query(sprintf($SQL,array($this->table(),$this->cdao->table(),$cid,$weixin,$cid)));
        $result = $query->row_array();
        return empty($result)?true: $result['num']<0;
    }

    public function m_validate($id,$code){
        $SQL="select * from %s c where c.id=%d and c.merchant_code='%s'";
        $this->query(sprintf($SQL,array($this->table(),$id,$code)));
        if(empty($result)) return false;
        $SQL="update %s set m_validate=true where id=%d";
        $this->db->query(sprintf($SQL,array($this->table(),$id)));
        return true;
    }

    public function u_validate($id,$weixin,$code,$phone){
        $SQL="select * from %s c where c.id=%d  and c.member_id='%s' and c.code='%s'";
        $this->query(sprintf($SQL,array($this->table(),$id,$weixin,$code)));
        if(empty($result)) return false;
        $SQL="update %s set u_validate=true ,memberphont='%s' where id=%d";
        $this->db->query(sprintf($SQL,array($this->table(),$phone,$id)));
        return true;
    }

}   