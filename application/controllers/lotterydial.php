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



    public  function __construct(){
        parent::__construct("Lotterydial_model");
        $this->load->model("Lotterywin_model",'winerdao');
    }





    public function index($id=FALSE){

        $lcfg  = $this->dao->getconfig($id);

        if(!$lcfg){
            $this->go_exceed();
            return;
        }

        $member  = $this->_get('member');



        $pubwx   = $this->_get('pubweixin');
        $usernum =  $this->winerdao->check_user_number($id,$member);


        if(!$usernum || $usernum['num']==0){
            $this->go_index($lcfg,$pubwx,$member);
            return;
        }


        $wins  = $this->winerdao->user_records($id,$member);
        if(empty($wins)){

            if($usernum['num']<$lcfg['userlimit']){
                $this->go_index($lcfg,$pubwx,$member);
                return;
            }else{
                $this->go_gameover();
                return;
            }
        }else{
            $this->go_cash($wins,$lcfg,$member);
            return ;
        }


    }

    private function  go_gameover(){
        $this->load->view("front/header");
        $this->load->view("lotterydial/gameover");
        $this->load->view("front/footer");
    }

    private function  go_exceed(){
        $this->load->view("front/header");
        $this->load->view("lotterydial/exceed");
        $this->load->view("front/footer");
    }


    private  function go_cash($wins,$lcfg,$member){
        $this->load->view("front/header");
        $gmap = array(
            '1'=>'first',
            '2'=>'second',
            '3'=>'third'
        );

        $nameMap = array(
            '1'=>'一等奖',
            '2'=>'二等奖',
            '3'=>'三等奖'

        );


        $g = $wins['wingrade'];
        $cdata = array(
            'prizegrade'=>$g,
            'prizename'=>$nameMap[$g],
            'prizemsg'=>$lcfg[$gmap[$g].'msg'],
            'prizecode'=>$wins['lottery_code'],
            'merchantcode'=>$wins['merchant_code'],
            'lotteryid'=>$lcfg['id'],
            'member'=>$member,
            'config'=>$lcfg
        );

        $this->fireLog($cdata);

        $this->load->view("lotterydial/getcode",$cdata);




        $this->load->view("front/footer");
    }



    private function go_index($lcfg,$pubwx,$member){

        $this->fireLog($lcfg);

        $this->load->view("front/header");
        $id = $lcfg['id'];




        $prize_arr = array(
            '0' => array('id'=>4,'min'=>1,'max'=>29,'prize'=>'继续努力','v'=>13),
            '1' => array('id'=>2,'min'=>302,'max'=>328,'prize'=>'二等奖','v'=>2),
            '2' => array('id'=>6,'min'=>242,'max'=>268,'prize'=>'继续努力','v'=>15),
            '3' => array('id'=>1,'min'=>182,'max'=>208,'prize'=>'一等奖','v'=>1),
            '4' => array('id'=>5,'min'=>122,'max'=>148,'prize'=>'继续努力','v'=>14),
            '5' => array('id'=>3,'min'=>62,'max'=>88,'prize'=>'三等奖','v'=>5),
            '6' => array('id'=>7,'min'=>array(32,92,152,212,272,332),
                'max'=>array(58,118,178,238,298,358),'prize'=>'继续努力','v'=>50)
        );

        $firsted  = $this->winerdao->get_winers($id,1);
        $seconded = $this->winerdao->get_winers($id,2);
        $thirded  = $this->winerdao->get_winers($id,3);

        $firstodd  = $lcfg['firstodds'];
        $secondodd = $lcfg['secondodds'];
        $thirdodd  = $lcfg['thirdodds'];

        if($firsted>=$lcfg['firstnum']) $firstodd = 0;
        if($seconded>=$lcfg['secondnum']) $secondodd = 0;
        if($thirded>=$lcfg['thirdnum']) $thirdodd= 0;

        //一等奖
        $prize_arr['3']['v'] = $firstodd;
        $prize_arr['3']['prize'] = $lcfg['firstmsg'];


        //二等奖
        $prize_arr['1']['v'] = $secondodd;
        $prize_arr['1']['prize'] = $lcfg['secondmsg'];

        //三等奖
        $prize_arr['5']['v'] = $thirdodd;
        $prize_arr['5']['prize'] = $lcfg['thirdmsg'];


        $ltotal = $firstodd+$secondodd+$thirdodd;


        $prize_arr['6']['prize'] = 8-$ltotal+50;

        $this->fireLog($prize_arr);

        $arr = array();

        foreach ($prize_arr as $key => $val) {
            $arr[$val['id']] = $val['v'];
        }

        $rid = $this->getRand($arr); //根据概率获取奖项id

        $res = $prize_arr[$rid-1]; //中奖项
        $min = $res['min'];
        $max = $res['max'];
        if($res['id']>3){ //空奖
            $i = mt_rand(0,5);
            $result['angle'] = mt_rand($min[$i],$max[$i]);
        }else{
            $result['angle'] = mt_rand($min,$max)+180; //随机生成一个角度
        }
        $result['prize'] = $res['prize'];
        $result['id']=$res['id'];
        $result['lotterycode'] = create_random_number(18);
        $result['member'] = urlencode($member);
        $result['merchantcode'] = base64_encode($lcfg['code']);
        $result['lotteryid'] = $lcfg['id'];
        $result['pubweixin'] = urlencode($pubwx);


        $this->fireLog($result);
        $this->load->view("lotterydial/index",$result);
        $this->load->view("front/footer");
    }

    public function winit($lottery,$member,$wingrade,$lcode){
         $data = array(
             "lotterydial_id"=>$lottery,
             "weixin_id"=>$member,
             'lottery_code'=>$lcode,
             'wingrade'=>$wingrade
         );
         $again = $this->dao->checklottory($data);
         echo  $again;

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


    public function lists($page=1,$rows=10){

        $pubwx = $this->nsession->userdata('pubwx');

        $result =  $this->dao->gets($page,$rows,array('pubweixin_id'=>$pubwx));

        $pagelink = $this->dao->page_link($page);
        $data['datasource'] = $result;
        $data['pagelink']=$pagelink;
        $this->load->view($this->dao->table()."/list",$data);
    }

    public function saveUpdate(){
        $data = $this->_xsl_post();
        $pubwx = $this->nsession->userdata('pubwx');
        $data['pubweixin_id']=$pubwx;
        $this->dao->saveUpdate($data);
    }

    public function current_url(){
        $pubwx = $this->nsession->userdata('pubwx');

        $url = $this->dao->current_url($pubwx);

        echo $url;
    }

    public function m_validate($lottery,$member,$code){

        $vrst = $this->winerdao->m_validate($lottery,$member,$code);
        echo $vrst;
    }

    public function u_validate($lottery,$member,$code){
        $vrst =  $this->winerdao->u_validate($lottery,$member,$code);
        echo $vrst;
    }

}