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
 * FileName application/controllers/prerogative.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Tue May 14 22:51:04 CST 2013
 *    
 */

class Prerogative extends MY_Controller {
     
    public  function __construct(){
        parent::__construct("Prerogative_model");
        $this->load->model('Pubweixin_model','pubdao');
    }

    public function index($cid=FALSE){

        (!$this->userid) AND redirect('welcome/bizlogin');
        $pubwxid = $this->nsession->userdata('pubwx');
        $pubwx = $this->pubdao->get($pubwxid,"weixin_id");
        $data['pubwx'] = $pubwx;
        $data['loginuser'] = $this->userid;

        $beans = $this->dao->get_for_card($cid);
        $data['beans'] = $beans;
        $data['cid']=$cid;
        $this->load->view("admin/header");
        $this->load->view("message/body-start",$data);
        $this->load->view("prerogative/index",$data);
        $this->load->view("admin/footer");
    }
    
     /**
      * 新增编辑
      */
    public function editNew($id=FALSE){
        
        $data =$this->dao->get($id);
        if(!$id)
            $data['cardcatalog_id']=$this->_get('cid');


        (!$this->userid) AND redirect('welcome/bizlogin');
        $pubwxid = $this->nsession->userdata('pubwx');
        $pubwx = $this->pubdao->get($pubwxid,"weixin_id");
        $data['pubwx'] = $pubwx;
        $data['loginuser'] = $this->userid;
        $this->load->view("admin/header");
        $this->load->view("message/body-start",$data);
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer");
    }
    
    
}   