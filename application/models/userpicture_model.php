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
 * FileName application/models/userpicture.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Userpicture_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Userpicture_model");
    }


    public function find_by_type($ptype,$page=1){
        $this->db->where("ptype",$ptype);
        $this->db->limit(9,($page-1)*9);
        $query = $this->db->get($this->table());
        $beans = $query->result_array();
        return $beans;
    }


    public function create_page_link($pname,$pval,$page=1){
        $config['base_url'] = "";
        $this->db->where($pname, $pval);
        $this->db->from($this->table());
        $config['total_rows'] = $this->db->count_all_results();;
        $config['per_page'] = 9;
        //$this->firelog($config);
        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_links($page);
        //$this->firelog($pagelink);
        return $pagelink;
    }

    public function find_by_selector($page){
        $beans = $this->gets($page);

        $config['base_url'] = "";
        $config['total_rows'] = $this->db->count_all_results();;
        $config['per_page'] = 12;
        //$this->firelog($config);
        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_links($page);
        $data =  array(
            "beans"=>$beans,
            "pagelink"=>$pagelink

        );
        return $data;
    }
    
}   