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
        $this->load->library('create_ckeditor');
        $this->load->model('Coupon_model',"cdao");
    }

    public function index($id=FALSE){


        $ccfg   = $this->dao->getconfig($id);

        $data = array(
            "msg"=>''

        );


        if(!$ccfg){
            $data['msg']='非法访问!';
            $this->load->view('front/header');
            $this->load->view("couponcatalog/exceed",$data);
            $this->load->view("front/footer");
            return;

        }

        $daily_limit = $this->cdao->check_daily_limit($id);
        if(!$daily_limit){
            $data['msg']='本优惠券今日已经领完,请明天再来,谢谢参与!';
            $this->load->view('front/header');
            $this->load->view("couponcatalog/exceed",$data);
            $this->load->view("front/footer");
            return;
        }

        $weixin = $this->_get('member');
        $user_limit = $this->cdao->check_user_daily_limit($id,$weixin);
        if(!$user_limit){
            $data['msg']='您已经领过该优惠券,谢谢参与!';
            $this->load->view('front/header');
            $this->load->view("couponcatalog/exceed",$data);
            $this->load->view("front/footer");
            return;
        }

        $code  = create_random_string(8);
        $data = array(
            'coupon_code'=>$code,
            'merchant_code'=>$ccfg['merchant_code'],
            'member_id'=>$weixin,
            'catalog_id'=>$id
        );
        $this->cdao->save($data);
        $data['bid'] = $this->dao->insert_id();
        $this->load->view('front/header');
        $this->load->view("couponcatalog/getcode",$data);
        $this->load->view("front/footer");

    }

    public function m_validate($cid,$code){
        $rst = $this->cdao->m_validate($cid,$code);
        echo $rst;
    }

    public function u_validate($cid,$weixin,$code,$phone){
        $rst = $this->cdao->u_validate($cid,$weixin,$code,$phone);
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
        $this->load->view("admin/header-pure");
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer-pure");
    }



    
    
}   