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
 * FileName application/controllers/cardcatalog.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:08 CST 2013
 *    
 */

class Cardcatalog extends MY_Controller {
     
    public  function __construct(){
        parent::__construct("Cardcatalog_model");
               $this->load->library('create_ckeditor');
        $this->load->model("Pubweixin_model", "pubdao");
        $this->load->model('Prerogative_model','pdao');
        $this->load->model('Cards_model','csdao');

    }

    public function index($id=FALSE){
        $pubwx  = $this->_get('pubweixin');
        $weixin = $this->_get('member');
        if(!$pubwx || !$weixin){
            redirect('/systems/accesserror');
            return;
        }

        $card =  $this->csdao->get_by_wxpw($pubwx,$weixin);
        $config = $this->dao->get_default_config($pubwx);
        if(!$card){

            if(!$config){
                $this->load->view('cardcatalog/noconfig');
                return;
            }

            $lastno    =  $this->dao->card_last_no($config['id']);
            $pubweixin =  $this->pubdao->get($pubwx,'weixin_id');
            $cdata =  array(
                'pubweixin_id'=>$pubwx,
                'weixin_id'=>$weixin,
                'name'=>$config['name'],
                'code'=>$lastno,
                'catalog_id'=>$config['id'],
                'm_phone'=>$pubweixin['phone'],
                'm_address'=>$pubweixin['address'],
                'm_name'=>$pubweixin['name'],
                'm_info'=>$pubweixin['info'],
                'remark'=>$config['remark']

            );
            $this->csdao->save($cdata,'',false);
            $card = $this->csdao->get_by_wxpw($pubwx,$weixin);
        }


        $preros =  $this->pdao->get_for_card($id);
        $data = array(
            'card'=>$card,
            'preros'=>$preros
        );

        $this->fireLog($data);

        $this->load->view("front/header");
        $this->load->view("cardcatalog/card-header",$data);
        $this->load->view("cardcatalog/index",$data);
        $this->load->view("front/footer");
    }

    public function noconfig(){
        $this->load->view("front/header");
        $this->load->view("cardcatalog/noconfig");
        $this->load->view("front/footer");
    }


     /**
      * 新增编辑
      */
    public function editNew($id=FALSE){
        
       $data = $this->dao->get($id);
       $ckcfg = array();
       $ckcfg["name"]  ="info";
             
       $ckcfg["value"] = $data["info"];

        $data['my_editor'] = $this->create_ckeditor->createEditor( $ckcfg);


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