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
 * FileName application/models/lotterywin.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Tue May 14 22:51:04 CST 2013
 *    
 */

class Lotterywin_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Lotterywin_model");
    }  

    public function get_winers($lottery,$grade){
        $SQL = "select count(id) as num from %s where lotterydial_id='%s' and wingrade=%d";
        $query =  $this->db->query(sprintf($SQL,$this->table(),$lottery,$grade));
        $result = $query->row_array();
        return $result['num'];
    }

    public function user_limition($lottery,$member){
        $SQL = "select (count(lw.id)-ld.userlimit) num
        from %s lw
        left join lotterydial ld on ld.id='%s'
        where lw.lotterydial_id=ld.id and lw.weixin_id='%s'";
        $query =  $this->db->query(sprintf($SQL,$this->table(),$lottery,$member));
        $result = $query->row_array();
        return $result['num']<0;
    }

    public function user_records($lottery,$member){
        $this->db->select("id,wingrade,lotterycode");
        $this->db->where("lotterydial_id",$lottery);
        $this->db->where("weixin_id",$member);
        $this->db->order_by("firedate","desc");
    }


}
