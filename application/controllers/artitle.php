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
 * Date: Wed Nov 28 23:40:02 CST 2012
 *    
 */

class Artitle extends Media_Controller {
     
    public  function __construct(){
        parent::__construct("Artitle_model");
        $this->load->library('create_ckeditor');

    }

    public function index(){
        $data = array();

        $this->load->view("front/header");
        $this->load->view("artitle/index",$data);
        $this->load->view("front/footer");
    }
    
     /**
      * 新增编辑
      */
    public function editNew($id=-1){
        

       $ckcfg = array();
       $ckcfg["name"]  ="content";
       $id = urldecode($id);
       $data = $this->dao->get($id);
       $data['id'] = $id;
       $this->fireLog($data);
       $ckcfg["value"] = $data["content"];
       $ckcfg["height"] = 500;
       $data['my_editor'] = $this->create_ckeditor->createEditor( $ckcfg);
       $this->load->view('admin/header');
       $this->load->view($this->dao->table()."/editNew",$data);
       $this->load->view('admin/footer');
    }

    public function one($id){
        $id = urldecode($id);
        $data  = array();
        $bean  = $this->dao->get($id);
        $bean['id'] = $id;
        $data['bean'] = $bean;
        $this->load->view($this->dao->table()."/one", $data);

    }

    public function one_info($aid,$lang='zh-cn'){
        $bean  =$this->dao->find_info($aid,$lang);
        $data  = array(
            "bean"=>$bean
        );

        $this->load->view('artitle/info',$data);
    }
    public function edit_one_info($aid,$lang='zh-cn'){
        $bean  =$this->dao->find_info($aid,$lang);
        $ckcfg["name"]  ="content";
        $ckcfg["value"] = isset($bean["content"])?$bean["content"]:'';
        $ckcfg["height"] = 500;
        $ckcfg["width"] = 880;
        $data['my_editor'] = $this->create_ckeditor->createEditor( $ckcfg);
        $data["bean"]=$bean;
        $this->load->view('admin/header-withoutbar');
        $this->load->view('artitle/info-edit',$data);
        $this->load->view('admin/footer');
    }

    public function save_info($aid,$lang){
        $data =  array(
            'aid'=>$aid,
            'lang'=>$lang,
            'name'=> $this->_post('name'),
            'content'=>$this->_post_no_xsl('content')
        );
        $this->dao->save_info($data);
        $this->load->view('common/result-close');
    }

    public  function selector($page=1){

        $this->load->view('admin/res-head');
        $this->load->view('artitle/selector');
    }

}