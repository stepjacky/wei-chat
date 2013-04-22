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
        $this->load->model('Myuser_model','usrDao');
    }

    public function index(){

       // (!$this->nsession->userdata('user')) AND redirect('admin/openlogin');


        $this->load->view("admin/header");
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
        $password  =$this->_post('password');
        $user = $this->usrDao->login($id,$password);
        $this->fireLog($user);
        !$user  AND redirect('/admin/openlogin');
        $this->nsession->set_userdata('user',$user);
        redirect('/admin/');

    }

    public function logout(){
        $this->nsession->sess_destroy();
        redirect('/admin/openlogin');
    }
}   