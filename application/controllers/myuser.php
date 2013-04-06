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
 * FileName application/controllers/myuser.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Wed Nov 28 23:40:02 CST 2012
 *    
 */

class Myuser extends MY_Controller {
     
    public  function __construct(){
        parent::__construct("Myuser_model");

        $this->load->helper('email');
    }

    public function index(){
        $data = array();
        
        $this->load->view("front/header");
        $this->load->view("myuser/index",$data);
        $this->load->view("front/footer");
    }
    
     /**
      * 新增编辑
      */
    public function editNew($id=-1){
        
        $data = array();

        $this->fireLog($id);
        if($id!=-1){

           $data = $this->dao->get($id);
        }else{
           $data = $this->dao->emptyObject();
        }
        $this->fireLog($data);
        $this->load->view("admin/res-head");
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer");
    }


    public function login(){
        $id =  $this->_post('id');
        $password =  $this->_post("password");
        $data = array('flag'=>'index');
        $this->__user_header($data);
        if(!$id || !$password){
            $data['info'] = '用户Email,密码都必须填写';
            $this->load->view('index/openlogin',$data);
            $this->load->view('front/footer');
            return;
        }


        $id = urldecode($id);
        $this->fireLog('登陆ID:'.$id);
        $rst = $this->dao->login($id,$password);
        if(!$rst){
            $data['info']='用户名或者密码错误';
            $this->load->view('index/openlogin',$data);
            $this->load->view('front/footer');
        }else{

            $this->session->set_userdata('user', $rst);

            $this->fireLog($rst);
            redirect(site_url().'/welcome/');
        }



    }

    public function register(){
        $id    = $this->_post('id');
        $name  = $this->_post('name');
        $pass  = $this->_post('password');


        $data = array('info'=>'','flag'=>'index');
        $this->__user_header($data);
        if(!$id || !$name || !$pass){
            $data['info'] = '用户Email,昵称,密码都必须填写';
            $this->load->view('index/register',$data);
            $this->load->view('front/footer');
            return;
        }

        $rst = $this->dao->register($id,$name,$pass);
        $data['register_rst']=$rst;



        if(!$rst){
            $data['info'] = '相同的用户已经注册，请重新选择注册Email';
            $this->load->view('index/register',$data);

        }else{
            $data['info'] = '恭喜!注册成功，请输入注册的用户名密码登陆';
            $this->load->view('index/openlogin',$data);
        }
        $this->load->view('front/footer');

    }

    public function rgetpass(){
        $email = urldecode($this->_post('email'));

        $data = array('email'=>$email);
        $this->__user_header($data);
        if (valid_email($email))
        {
            $user = $this->dao->find_by_email($email);
            if(!$user){
                $this->load->view('myuser/bademail');
            }else{
                send_email('recipient', 'subject', '这是测试邮件');
                $this->load->view('myuser/mailsent',$data);
            }
        }
        else
        {
            $this->load->view('myuser/bademail',$data);

        }

        $this->load->view('front/footer');
    }

    public function modify_avatar(){

        $path = $this->_post('avatar');
        $user = $this->session->userdata("user");
        if(!$user) return;
        $data = array(
            'id' => $user['id'],
            'avatar'=>$path
        );
        $this->dao->update($data);
    }

    public function avator(){

        //$this->load->view('front/res-header');
        $this->load->view('myuser/avator');
       // $this->load->view('front/res-footer');
    }
}   