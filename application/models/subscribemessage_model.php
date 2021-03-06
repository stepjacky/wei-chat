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
 * FileName application/models/subscribemessage.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Mon Apr 29 08:57:18 CST 2013
 *    
 */

class Subscribemessage_model extends Response_simple_Message_Model {
     
    public  function __construct(){
        parent::__construct("Subscribemessage_model");
    }

    public function get($id){
        return parent::get($id,$this->FromUserKey);
    }

    public function  saveUpdate($data){

        $bean = $this->get($this->FromUserName);

        if(isset($bean['empty']) && $bean['empty']){
            $this->save($data);
        }else{
            $this->update($data);
        }

    }
    public function save($data)
    {
        $data[$this->FromUserKey] = $this->FromUserName;
        $this->db->insert($this->table, $data);
    }

    public function update($data)
    {
        $data[$this->FromUserKey] = $this->FromUserName;
        return parent::update($data, $this->FromUserKey); // TODO: Change the autogenerated stub
    }


    public function response($keywords, $fromuser, $touser)
    {

        $data =  $this->get($fromuser);
        $content = empty($data['content'])?'欢迎关注我们公众平台!':$data['content'];
        $content = empty($data)?'欢迎关注我们公众平台!':$content;

        return $this->simple_message($fromuser,$touser,$content);
    }

    public function unsubscribe($fromuser, $touser){
        $content='如果对我们的服务不满意,请联系我们,谢谢关注!';
        return $this->simple_message($fromuser,$touser,$content);
    }

    private function simple_message($fromuser, $touser,$content){
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>0</FuncFlag>
</xml>";
        $resultStr = sprintf($textTpl, $touser,  $fromuser,time(), $content);
        return $resultStr;
    }


}   