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
 * FileName application/models/lotterydial.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Tue May 14 22:51:04 CST 2013
 *    
 */

class Lotterydial_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Lotterydial_model");
    }



    public function getconfig($pubwx){

        $this->db->select("id,code,userlimit,firstnum,firstmsg,firstodds,secondnum,secondmsg,secondodds,thirdnum,thirdmsg,thirdodds");
        $this->db->where("pubweixin_id",$pubwx);
        $this->db->where("DATEDIFF(CURRENT_DATE,enddate)>","0");
        $this->db->where("DATEDIFF(CURRENT_DATE,startdate)<","0");
        $this->db->where("enabled",true);
        $query =   $this->db->get($this->table());
        $result = $query->row_array();
        return empty($result)?FALSE:$result;
    }


    public function set_enabled($pubwx,$id,$enable=TRUE){
        $this->db->trans_start();
        if($enable){
            $this->db->where("pubweixin_id",$pubwx);
            $this->db->update($this->table(),array("enabled"=>false));
        }
        $this->db->where("id",$id);
        $this->db->update($this->table(),array("enabled"=>$enable));
        $this->db->trans_complete();
    }

    public function  checklottory(&$data){
        $pubweixin = $data['pubweixin_id'];
        $lottery   = $data['lotterydial_id'];
        $member    = $data['member'];
        $wingrade  = $data['wingrade'];

        $limition = $this->get_user_limition($lottery);
        $this->db->trans_start();
        if($wingrade<=3){
            $this->db->insert('lottorywin',$data);
            $data['num'] = $limition;
            unset($data['wingrade']);
            unset($data['merchant_code']);
            unset($data['lottory_code']);
            $this->db->insert("lotterynum",$data);
            $this->db->trans_complete();
            return false;
        }


        $this->db->select("num");
        $this->db->where("pubweixin_id",$pubweixin);
        $this->db->where("lotterydial_id",$lottery);
        $this->db->where("weixin_id",$member);
        $query =  $this->db->get("lotterynum");
        $result = $query->row_array();
        if($result['num']==$limition){
            return false;
        }else if($result['num']==0){

            $this->db->insert("lottery",$data);
            $this->db->trans_complete();
            return true;
        }else if($result['num']>=1 && $result['num']<=$limition){
            $this->db->where("pubweixin_id",$pubweixin);
            $this->db->where("lotterydial_id",$lottery);
            $this->db->where("weixin_id",$member);
            $data['num']=$limition+1;
            $this->db->update('lotterynum',$data);
            $this->db->trans_complete();
            return false;
        }

    }

    public function current_url($pubwx){
        $SQL="select id from lotterydial where pubweixin_id='%s' and enabled is true order by startdate desc limit 0,1";
        $result =  $this->query(sprintf($SQL,$pubwx));
        $this->firelog($result);
        return empty($result)?'':base_url("/lotterydial/index/".$result[0]['id']);
    }

    public function get_user_limition($lottery){
        $this->db->select("userlimit");
        $this->db->where("id",$lottery);
        $query = $this->db->get($this->table());
        $result =  $query->row_array();
        return empty($result)?0:$result['userlimit'];
    }
    
}   