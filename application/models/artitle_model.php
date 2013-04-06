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
 * FileName application/models/qualityc.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Wed Nov 28 23:40:02 CST 2012
 *    
 */

class Artitle_model extends PK_Model {
     
    public  function __construct(){
        parent::__construct("Artitle_model");
    }

    public function saveUpdate($data,$pk='id'){
        $pk = urldecode($pk);
        $id = $data[$pk];
        if(!$this->__valid($id))return;
        $bean = $this->get($id,$pk);
        if( $bean['empty'] ){
            $this->save($data,$pk,FALSE);
        }else{
            $this->update($data,$pk);
        }
    }


    public function list_by_tag($tag='',$page=1,$rows=10){
        $data = array();
        $this->db->select("id,name,tags,firedate,summary,minipic");
        $this->db->like('tags',$tag);
        $this->db->order_by('firedate','desc');
        $this->db->limit($rows,0);
        $query = $this->db->get($this->table());
        $beans = $query->result_array();
        $data['list'] = $beans;
        $config['base_url'] = "/".$this->table()."/service_by_tag/$tag";
        $this->db->like('tags', $tag);
        $this->db->from($this->table());
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = $rows;
        //$this->firelog($config);
        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_links($page);
        $data['pagelink'] = $pagelink;
        return $data;

    }

    public function find_info($aid,$lang='zh-cn'){
        $this->db->select("name,content");
        $this->db->where('aid',$aid);
        $this->db->where('lang',$lang);
        $query = $this->db->get('artitle_info');
        $data  = $query->first_row('array');
        $this->firelog($data);
        if(count($data)==0)$data['empty']=TRUE;
        $data['aid']=$aid;
        $data['lang']=$lang;
        return $data;
    }

    public function  save_info($data){
        $aid   = $data['aid'];
        $lang  = $data['lang'];
        $bean =  $this->find_info($aid,$lang);
        $empty = isset($bean['empty']);
        unset($bean['empty']);
        if($empty){
            $this->db->insert('artitle_info', $data);
        }else{
            $this->db->where('aid',$aid);
            $this->db->where('lang',$lang);
            $this->db->update('artitle_info', $data);
        }
    }

    public function find_cata_content($id,$lang='zh-cn'){

        $bean = array();
        $this->db->select("content");
        $this->db->where('aid',$id);
        $this->db->where('lang',$lang);
        $query = $this->db->get('artitle_info');
        $data = $query->first_row('array');
        $bean['content'] = isset($data['content'])?$data['content']:'';
        $SQL="select af.name name from artitle a join artitle_info af on af.aid=a.parent and af.lang=?  where a.id=?";
        $query = $this->db->query($SQL,array($lang,$id));
        $name =  $query->first_row('array');
        $bean['pName'] = isset($name['name'])?$name['name']:'';
        return  $bean;
    }

}   