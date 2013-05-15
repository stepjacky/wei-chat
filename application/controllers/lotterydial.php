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
 * FileName application/controllers/lotterydial.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Tue May 14 22:51:04 CST 2013
 *    
 */

class Lotterydial extends MY_Controller {


    private $prize_arr = array(
        '0' => array('id'=>1,'min'=>1,'max'=>29,'prize'=>'一等奖','v'=>1),
        '1' => array('id'=>2,'min'=>302,'max'=>328,'prize'=>'二等奖','v'=>2),
        '2' => array('id'=>3,'min'=>242,'max'=>268,'prize'=>'三等奖','v'=>5),
        '3' => array('id'=>4,'min'=>182,'max'=>208,'prize'=>'四等奖','v'=>7),
        '4' => array('id'=>5,'min'=>122,'max'=>148,'prize'=>'五等奖','v'=>10),
        '5' => array('id'=>6,'min'=>62,'max'=>88,'prize'=>'六等奖','v'=>25),
        '6' => array('id'=>7,'min'=>array(32,92,152,212,272,332),
            'max'=>array(58,118,178,238,298,358),'prize'=>'七等奖','v'=>50)
    );


    public  function __construct(){
        parent::__construct("Lotterydial_model");
    }





    public function index($id=FALSE){

        $arr = array();

        foreach ($this->prize_arr as $key => $val) {
            $arr[$val['id']] = $val['v'];
        }

        $rid = $this->getRand($arr); //根据概率获取奖项id

        $res = $this->prize_arr[$rid-1]; //中奖项
        $min = $res['min'];
        $max = $res['max'];
        if($res['id']==7){ //七等奖
            $i = mt_rand(0,5);
            $result['angle'] = mt_rand($min[$i],$max[$i]);
        }else{
            $result['angle'] = mt_rand($min,$max); //随机生成一个角度
        }
        $result['prize'] = $res['prize'];



        $this->load->view("front/header");
        $this->load->view("lotterydial/index",$result);
        $this->load->view("front/footer");
    }
    
     /**
      * 新增编辑
      */
    public function editNew($id=FALSE){
        
       $data = $this->dao->get($id);
             
     
        
        $this->load->view("admin/header-pure");
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer-pure");
    }


    function getRand($proArr) {
        $result = '';

        //概率数组的总概率精度
        $proSum = array_sum($proArr);

        //概率数组循环
        foreach ($proArr as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset ($proArr);

        return $result;
    }
    
    
}   