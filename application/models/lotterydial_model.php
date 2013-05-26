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

class Lotterydial_model extends Response_news_message_extModel {
     
    public  function __construct(){
        parent::__construct("Lotterydial_model");
    }




    public function getconfig($id){

        $this->db->select("id,code,userlimit,
        ,pubweixin_id,remark,
        firstnum,firstmsg,firstodds,secondnum,secondmsg,secondodds,thirdnum,thirdmsg,thirdodds");
        $this->db->where("id",$id);
        $this->db->where("DATEDIFF(CURRENT_DATE,enddate)<=","0");
        $this->db->where("DATEDIFF(CURRENT_DATE,startdate)>=","0");
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

    public function  checklottory($data){



        $lottery   = $data['lotterydial_id'];
        $member    = $data['weixin_id'];
        $wingrade  = $data['wingrade'];
        $lotcode   = $data['lottery_code'];


        $lotcfg = $this->getconfig($lottery);
        $pubweixin = $lotcfg['pubweixin_id'];
        $this->db->trans_start();

        $limition = $this->get_user_limition($lottery);

        $this->db->select("num");
        $this->db->where("lotterydial_id",$lottery);
        $this->db->where("weixin_id",$member);
        $query =  $this->db->get("lotterynum");
        $result = $query->row_array();

        if($wingrade<=3){
            $wdata = array(
                'weixin_id'=>$member,
                'wingrade' =>$wingrade,
                'merchant_code'=>$lotcfg['code'],
                'lottery_code'=>$lotcode,
                'lotterydial_id'=>$lottery

            );
            $this->db->insert('lotterywin',$wdata);
            if($result['num']>=0 && $result['num']<$limition){

                $this->db->where("lotterydial_id",$lottery);
                $this->db->where("weixin_id",$member);
                $tldata['num']=$limition;
                $this->db->update('lotterynum',$tldata);

            } else{
                $ndata = array(
                    'num'=>$limition,
                    'weixin_id'=>$member,
                    'lotterydial_id'=>$lottery,
                    'pubweixin_id'=>$pubweixin
                );
                $this->db->insert("lotterynum",$ndata);
            }
            $this->db->trans_complete();
            return false;
        }


        //没有抽中奖处理


        if(!$result){

            $ndata = array(
                'num'=>1,
                'weixin_id'=>$member,
                'lotterydial_id'=>$lottery,
                'pubweixin_id'=>$pubweixin
            );
            $this->db->insert("lotterynum",$ndata);
            $this->db->trans_complete();
            return true;
        }

        if($result['num']>=0 && $result['num']<$limition){


            $this->db->where("lotterydial_id",$lottery);
            $this->db->where("weixin_id",$member);
            $tldata['num']=$result['num']+1;
            $this->db->update('lotterynum',$tldata);
            $this->db->trans_complete();
            return !($data['num']==$limition);

        }else if($result['num']==$limition){
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