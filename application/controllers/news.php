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
 * FileName application/controllers/news.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Sun Apr 28 16:16:07 CST 2013
 *    
 */

class News extends MY_Controller {
     
    public  function __construct(){
        parent::__construct("News_model");
        $this->load->library('create_ckeditor');
        $this->load->model("Pubweixin_model", "pubdao");

    }

    public function index($id=FALSE){
         $data = $this->dao->get($id);        
        //$this->load->view("admin/header-pure");
        $this->load->view("news/index",$data);
        //$this->load->view("admin/footer-pure");
    }
    
     /**
      * 新增编辑
      */
    public function editNew($id=FALSE){

        $this->userid or redirect('/welcome/bizlogin');
        $data = $this->dao->get($id);
        $pubwx_id    = $this->nsession->userdata('pubwx');
        $data['loginuser']=$this->userid;
        $pubwx =  $this->pubdao->get($pubwx_id,'weixin_id');
        $data['pubwx']=$pubwx;
        $ckcfg = array();
        $ckcfg["name"]  ="content";
        $ckcfg["value"] = $data["content"];
        $data['my_editor'] = $this->create_ckeditor->createEditor( $ckcfg);
        $this->load->view("admin/header");
        $this->load->view("message/body-start",$data);
        $this->load->view("news/editNew",$data);
        $this->load->view("admin/footer");

    }
    
    
}   