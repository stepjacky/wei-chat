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
 * FileName application/controllers/picture.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Wed Nov 28 23:40:03 CST 2012
 *    
 */

class Picture extends MY_Controller {
     
    public  function __construct(){
        parent::__construct("Picture_model");
        $this->load->library('upload');
    }

    public function index(){
        $data = array();

        $this->load->view("admin/header");
        $this->load->view("picture/index",$data);
        $this->load->view("admin/footer");
    }


    public function add_picture($phone){

        if(!isset($phone)) return;
        if (!$this->upload->do_upload('Filedata'))
        {
            $error = array('error' => $this->upload->display_errors("<p>","</p>"));

            $this->load->view('upload_form', $error);
        }
        else
        {
            $fileData = $this->upload->data();

            if($phone=="artitle" || $phone=="video"){
                $data = array(
                    "path"=>"/resources/images/uploads/".$fileData['file_name'],
                    'name'=>$fileData['client_name'],
                    'width'=>$fileData['image_width'],
                    'height'=>$fileData['image_height'],
                    'ptype'=>$phone
                );
            }else{
                $data = array(
                    "phone_id"=>$phone,
                    'name'=>$fileData['client_name'],
                    'width'=>$fileData['image_width'],
                    'height'=>$fileData['image_height'],
                    "path"=>"/resources/images/uploads/".$fileData['file_name'],
                    'ptype'=>"plist"
                );
            }

            //$this->fireLog($fileData);
            $this->dao->saveupdate($data);
            $data = array('Filedata' => $fileData);

            $this->load->view('upload_success', $data);
        }
    }




    public function thumbnails($ptype,$page=1){
        $data = array();
        $data['ptype'] = $ptype;
        if($ptype=="artitle" || $ptype=="video"){
            $beans = $this->dao->find_by_type($ptype,$page);
            $pagelink = $this->dao->create_page_link('ptype',$ptype,$page);
        }else{
            $beans =  $this->dao->find_by_phone($ptype,$page);
            $pagelink = $this->dao->create_page_link('phone_id',$ptype,$page);

        }

        $data['beans']     = $beans;
        $data['pagelink']  = $pagelink;
        $this->load->view($this->dao->table()."/thumbnails",$data);
    }

    public function selector_thumbnails($ptype,$page=1){
        $data = array();
        $data['ptype'] = $ptype;
        $beans = $this->dao->find_by_type($ptype,$page);
        $pagelink = $this->dao->create_page_link('ptype',$ptype,$page);

        $data['beans']     = $beans;
        $data['pagelink']  = $pagelink;
        $this->load->view($this->dao->table()."/selector-thumbnails",$data);
    }



    public function update_ptype($id,$ptype){
        $data = array(
            "id"=>$id,
            "ptype"=>$ptype
        );

        $this->dao->update($data);
    }

    public function selector(){
        $this->load->view('admin/header-pure');
        $this->load->view('picture/selector');
    }

    public function input(){
        $this->load->view('admin/header-pure');
        $this->load->view('picture/input');
    }
    public function selector_list($page=1){
        $data =  $this->dao->find_by_selector($page,10);
        $this->load->view('picture/selector-list',$data);
    }
    
}   