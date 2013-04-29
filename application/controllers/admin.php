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
 * FileName application/controllers/qualityc.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Sun Nov 25 14:59:32 CST 2012
 *    
 */

class Admin extends MY_Controller {
     
    public  function __construct(){
        parent::__construct();
        $this->load->model('Merchant_model','usrDao');
    }

    public function index(){

        $user = $this->nsession->userdata('user');
        (!$user) AND redirect('welcome/bizlogin');


        $this->load->view("admin/header");
        $this->load->view("admin/body-start",$user);
        $this->load->view("admin/index");
        $this->load->view("admin/footer");
    }

    public function openlogin(){
        $this->load->view("admin/header");
        $this->load->view("admin/openlogin");
        $this->load->view("admin/footer");
    }

    public function login(){


        $id  =$this->_post("id");
        $password  =$this->_post('pword');
        $user = $this->usrDao->login($id,$password);
        $this->fireLog($user);
        !$user  AND redirect('/welcome/bizlogin');
        $this->nsession->set_userdata('user',$user);
        redirect('/admin');

    }

    public function register(){
        $data = $this->_no_xsl_post();
        $cap = $this->nsession->userdata("capword");
        $this->fireLog("session cap is :"+$cap);
        if(!$cap OR strtolower($cap)!=strtolower($data['capcode'])) {

            redirect('/welcome/start_register?info=验证码错误');


        }
        $udata = array(
            "id"    =>$data['id'],
            'pword' =>$data['pword'],
            'email' =>urldecode($data['email'])
         );
        $this->fireLog($udata);
        $rst  = $this->usrDao->register($udata,FALSE);
        $info = !$rst?"相同用户已存在":'';
        if(!$rst){
            redirect('/welcome/start_register?info='.$info);
        }else{
            redirect('/welcome/bizlogin');
        }
    }



    public function logout(){
        $this->nsession->sess_destroy();
        redirect('/welcome/bizlogin');
    }
}   