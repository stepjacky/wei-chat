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
 * FileName application/controllers/couponcatalog.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:08 CST 2013
 *    
 */

class Couponcatalog extends MY_Controller {
     
    public  function __construct(){
        parent::__construct("Couponcatalog_model");
        $this->load->model("Pubweixin_model", "pubdao");
        $this->load->model('Coupon_model','copdao');
        $this->load->model('Cardcatalog_model','cardcdao');
        $this->load->model('Cards_model','carddao');
        $this->load->library('create_ckeditor');
    }

    /**
     *优惠券主页
     */
    public function coupon(){
        $pubwx   = $this->_get('pubweixin');
        $weixin  = $this->_get('member');

        $card =  $this->carddao->get_by_wxpw($pubwx,$weixin);
        if(!$card){
            $cardcfg = $this->cardcdao->get_default_config($pubwx);
            if(!$cardcfg){
                $this->load->view('cardcatalog/noconfig');
                return;
            }

            redirect(sprintf('/cardcatalog/index/%s?pubweixin=%s&member=%s',$cardcfg['id'],$pubwx,$weixin));

            return;
        }
        $coupons  = $this->dao->get_by_pubwx($pubwx);
        $data = array(
            'beans'=>$coupons,
            'card'=>$card,
            'pubwx'=>$pubwx,
            'weixin'=>$weixin
        );

        $this->load->view('front/header');
        $this->load->view('cardcatalog/card-header',$data);
        $this->load->view('couponcatalog/coupon',$data);
        $this->load->view('front/footer');

    }

    /**
     *优惠券领取主页
     */
    public function index($id=FALSE){


        $config  = $this->dao->getconfig($id);
        $weixin = $this->_get('member');


        if(!$config){
            $this->illage_access();
            return;

        }


        $validated =  $this->copdao->is_validated($id,$weixin);



        $daily_limit = $this->copdao->check_daily_limit($id);
        if(!$daily_limit && $validated){
            $this->out_of_date();
            return;
        }

        $user_limit = $this->copdao->check_user_daily_limit($id,$weixin);

        if(!$user_limit && $validated){
            $this->has_validated($id,$weixin);
            return;
        }

        if(!$validated){

            $coupon =  $this->copdao->get_coupon($id,$weixin);
            if($coupon){
                $this->has_validated($id,$weixin,false);
            }else{
                $this->claim_coupon($id,$config,$weixin);

            }
            return;
        } else{
            $this->has_validated($id,$weixin);
            return;
        }
        $this->claim_coupon($id,$config,$weixin);


    }


    private function illage_access(){
        $data['msg']='非法访问!';
        $this->load->view('front/header');
        $this->load->view("couponcatalog/exceed",$data);
        $this->load->view("front/footer");
    }


    private function has_validated($cid,$weixin,$validated=true){
        $coupon =  $this->copdao->get_coupon($cid,$weixin);
        $coupon['validated'] = $validated;
        $this->load->view('front/header');
        $this->load->view("couponcatalog/getcode",$coupon);
        $this->load->view("front/footer");
    }


    private function out_of_date(){
        $data['msg']='本优惠券今日已经领完,请明天再来,谢谢参与!';
        $this->load->view('front/header');
        $this->load->view("couponcatalog/exceed",$data);
        $this->load->view("front/footer");
    }

    private function claim_coupon($cid,$config,$weixin){
        $code  = create_random_string(8);
        $data = array(
            'code'=>$code,
            'm_code'=>$config['merchant_code'],
            'name'=>$config['name'],
            'weixin_id'=>$weixin,
            'catalog_id'=>$cid,
            'csetting'=>$config['csetting'],
            'remark'=>$config['remark']
        );
        $this->firelog($data);
        $this->copdao->save($data,'id',FALSE);
        $this->load->view('front/header');
        $this->load->view("couponcatalog/getcode",$data);
        $this->load->view("front/footer");
    }



    public function m_validate($cid,$weixin,$mcode,$ucode){
        $rst = $this->copdao->m_validate($cid,$weixin,$mcode,$ucode);
        echo $rst;
    }

    public function u_validate($cid,$weixin,$code,$phone){
        $rst = $this->copdao->u_validate($cid,$weixin,$code,$phone);
        echo $rst;
    }


     /**
      * 新增编辑
      */
    public function editNew($id=FALSE){
        
        $data = $this->dao->get($id);
             
        $ckcfg = array();

        $ckcfg["name"]  ="remark";
             
        $ckcfg["value"] = $data["remark"];

        $data['my_editor'] = $this->create_ckeditor->createEditor( $ckcfg);

        $user = $this->nsession->userdata('user');
        (!$user) AND redirect('welcome/bizlogin');
        $pubwxid = $this->nsession->userdata('pubwx');
        $pubwx = $this->pubdao->get($pubwxid,"weixin_id");
        $data['pubwx'] = $pubwx;
        $data['loginuser'] = $user['id'];
        $this->load->view("admin/header");
        $this->load->view("message/body-start",$data);
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer");
    }



    
    
}   