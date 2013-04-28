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
 * FileName application/models/respnewsmessage.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Respnewsmessage_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Respnewsmessage_model");
    }  


    public function save($data,$pk="id",$gen=TRUE){

        $this->db->trans_start();
        $newslist = $data['newslist'];
        unset($data['newslist']);

        if($gen)$data[$pk]=getGuidId();

        $str = $this->db->insert_string($this->table(), $data);
        $this->firelog($str);
        $this->db->insert($this->table, $data);

        $udata = array();
        foreach ($newslist as $key=>$news){
            array_push(
                $udata,
                array(
                "respnewsid"=>$data['id'],
                "newsid"=>$news
            ));
        }
        $this->firelog($udata);
        $this->db->insert_batch("respnewslist",$udata);
        $this->db->trans_complete();
    }

    public function update($data,$pk="id"){
        $this->db->trans_start();
        $newslist = $data['newslist'];
        unset($data['newslist']);
        parent::update($data);
        $udata = array();
        foreach ($newslist as $key=>$news){
            array_push(
                $udata,
                array(
                    "respnewsid"=>$data['id'],
                    "newsid"=>$news
                ));
        }
        $this->db->truncate("respnewslist");
        $this->db->insert("respnewslist",$udata);
        $this->db->trans_complete();
    }

    public function get_newslist($respid){
        $SQL = "select n.id id,n.name name from respnewslist rn
                right join news n on n.id=rn.newsid
                where rn.respnewsid=?";
        $query =  $this->db->query($SQL,array($respid));
        $beans = $query->result_array();
        return $beans;
    }

    public function get($id=FALSE,$pk="id"){
        $data = parent::get($id,$pk);
        $data['newslist'] = $this->get_newslist($id);
        return $data;
    }

    
}   