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
 * FileName application/models/couponcatalog.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:08 CST 2013
 *    
 */

class Couponcatalog_model extends Response_news_message_extModel {
     
    public  function __construct(){
        parent::__construct("Couponcatalog_model");
        $this->load->model('Cards_model','cdao');
    }  


    public function get_by_pubwx($pubwx){
        $this->db->select("id,name");
        $this->db->where('pubweixin_id',$pubwx);
        $query = $this->db->get($this->table());
        return $query->result_array();
    }



    public function getconfig($id){
        $this->db->where("id",$id);
        $this->db->where("DATEDIFF(CURRENT_DATE,enddate)<=","0");
        $this->db->where("DATEDIFF(CURRENT_DATE,startdate)>=","0");
        $this->db->where("enabled",true);
        $query =   $this->db->get($this->table());
        $result = $query->row_array();
        return empty($result)?FALSE:$result;
    }

    protected function find_with_keywords($keywords){

        $this->db->select("id,name,remark,picurl");
        $this->db->where('keyword',$keywords);
        $query = $this->db->get($this->table());
        $result = $query->row_array();
        return $result;

    }

    protected function assemble_news($news)
    {

        $newslist = array();
        foreach($news as $bean){
            array_push($newslist,
                array(
                    'name'=>$bean['name'],
                    'info'=>$bean['info'],
                    'picurl'=>$bean['picurl'],
                    'url'=>base_url('/couponcatalog/index/'.$bean['id'])
                )
            );
        }


        return $newslist;
    }

    public function response($keywords,$fromuser,$touser){
        $newslist = array(
            array(
                'name'=>'优惠券开始了',
                'info'=>'优惠券开始发行,先到先得',
                'picurl'=>'/resources/images/coupon.jpg',
                'url'=>base_url(sprintf('/couponcatalog/coupon?pubweixin=%s&member=%s',$fromuser,$touser))
            )
        );

        return  $this->buildMessage($fromuser,$touser,$newslist);
    }
}