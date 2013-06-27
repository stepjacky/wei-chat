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


    /**
     * @return true if 0<x<limition visa false
     *
     */
    public function check_daily_limit($cid){
        $SQL="select (count(c.id)-p.daily_limit) num from coupon c,couponcatalog p
              where c.catalog_id='%s' and datediff(current_date,c.firedate)=0
              and p.id='%s'
              ";
        $query = $this->db->query(sprintf($SQL,$cid,$cid));
        $result = $query->row_array();

        return empty($result)?true:$result['num']<0;
    }

    /**
     * @return true if 0<x<limition visa false
     *
    */
    public function check_user_daily_limit($cid,$weixin){
        $SQL="select (count(c.id)-p.user_daily_limit) num  from coupon c , couponcatalog p
              where c.catalog_id='%s' and c.weixin_id='%s'
              and p.id='%s'
        ";
        $query = $this->db->query(sprintf($SQL,$cid,$weixin,$cid));
        $result = $query->row_array();
        return empty($result)?true: $result['num']<0;
    }

    public function is_validated($id,$weixin){
        $this->db->select("m_validated,u_validated");
        $this->db->where('id',$id);
        $this->db->where('weixin_id',$weixin);
        $query = $this->db->get($this->table());
        $result = $query->row_array();
        return empty($result)?false:($result['m_validated'] && $result['u_validated']);
    }

    public function m_validate($cid,$weixin,$mcode,$ucode){
        $SQL="select * from coupon c where c.catalog_id='%s' and c.weixin_id='%s' and c.merchant_code='%s' and c.code='%s'";
        $this->query(sprintf($SQL,array($this->table(),$cid,$weixin,$mcode,$ucode)));
        if(empty($result)) return false;
        $SQL="update coupon set m_validated=true where catalog_id='%s' and weixin_id='%s' and m_code='%s' and code='%s'";
        $this->db->query(sprintf($SQL,$cid,$weixin,$mcode,$ucode));
        return true;
    }

    public function u_validate($cid,$weixin,$ucode,$phone){
        $SQL="select * from coupon c where c.catalog_id='%s'  and c.weixin_id='%s' and c.code='%s'";
        $result = $this->query(sprintf($SQL,$cid,$weixin,$ucode));
        if(empty($result)) return false;
        $SQL="update coupon set u_validated=true ,memberphone='%s' where catalog_id='%s' and weixin_id='%s' and code='%s'";
        $this->db->query(sprintf($SQL,$phone,$cid,$weixin,$ucode));
        return true;
    }

    public function get_coupon($cid,$weixin){
        $this->db->where('catalog_id',$cid);
        $this->db->where('weixin_id',$weixin);
        $query = $this->db->get($this->table());
        return $query->row_array();
    }


}   