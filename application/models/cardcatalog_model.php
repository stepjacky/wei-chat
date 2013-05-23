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
 * FileName application/models/cardcatalog.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:08 CST 2013
 *    
 */

class Cardcatalog_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Cardcatalog_model");
    }

    public function card_last_no($id){
        $this->db->select('num');
        $this->db->where('cardcatalog_id',$id);
        $query = $this->db->get('cardnum');
        $result = $query->row_array();

        if(!$result){
            $data = array(
                'cardcatalog_id',$id,
                'num'=>0
            );
            $this->db->insert('cardnum',$data);
            $num = 0;
        }else{
            $num = $result['num'];
        }

        $this->db->set('num',$num+1);
        $this->db->where('cardcatalog_id',$id);
        $this->db->update('cardnum');
        return $num+1;
    }


    public function get_default_config($pubwx){
        $this->db->where('pubweixin_id',$pubwx);
        $this->db->where('enabled',true);
        $query = $this->db->get($this->table());
        $result = $query->row_array();
        return empty($result)?false:$result;
    }


    public function toggle_prop($prop,$id,$pk="id"){

        $this->update(
            array(
                $prop=>"!".$prop,
                $pk=>$id
            )
        );
        $data = array(
            $prop=>$prop
        );

        $this->db->where($pk."!=", $id);
        $this->db->update($this->table(), $data);
    }
    
    
}   