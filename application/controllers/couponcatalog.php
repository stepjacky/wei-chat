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
        $this->load->model('Merchant_model',"mercdao");
    }

    public function index($id=FALSE,$merc){


        $bean = $this->dao->get($id);

        $merc = $this->mercdao->get($merc);

        $bean['merc']=  $merc;

        $this->load->view('front/header');
        $this->load->view("couponcatalog/index",$bean);
        $this->load->view("front/footer");
    }

    public function get_code($id,$merc){
        $code = create_random_string(5);
        $enc  = md5($code);
        $vi   = rand(0,strlen($enc));
        $vc   = substr($enc,$vi,1);
        $code = $code.$vi.$vc;
        $bean = $this->dao->get($id);
        $merc = $this->mercdao->get($merc);
        $bean['merc']=  $merc;
        $bean['vcode'] = $code;
        $bean['id']    = $id;
        $this->load->view('front/header');
        $this->load->view("couponcatalog/get-code",$bean);
        $this->load->view("front/footer");

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

    public function startvalidate($cataid){
        $data = array("catalog_id"=>$cataid);
        $this->load->view($this->dao->table()."/startvalidate",$data);
    }

    public function saveUpdate(){
        $data = $this->_no_xsl_post();
        $data['merchant_id'] = $this->userid;
        $this->dao->saveUpdate($data);
        $this->_end();
    }

    
    
}   