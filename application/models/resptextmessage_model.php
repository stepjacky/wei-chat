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
 * FileName application/models/resptextmessage.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Resptextmessage_model extends Response_simple_Message_Model {
     
    public  function __construct(){
        parent::__construct("Resptextmessage_model");
    }

    protected function find_with_keywords($keywords)
    {
        $this->db->select("content");
        $this->db->where('keyword',$keywords);
        $query = $this->db->get($this->table());
        $result = $query->row_array();
        return $result;
    }


    protected function buildMessage($fromuser, $touser, $news)
    {
        if(empty($news)) return $this->unknow_keyword_message($fromuser,$touser);
        $msgTempl = "
        <xml>
 <ToUserName><![CDATA[%s]]></ToUserName>
 <FromUserName><![CDATA[%s]]></FromUserName>
 <CreateTime>%d</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[%s]]></Content>
 <FuncFlag>0</FuncFlag>
 </xml>";

        $content = empty($news)?'不认识这个词哦':($news['content']?$news['content']:'还没想到答案呢?');

        $resp = sprintf($msgTempl,$touser,$fromuser,time(),$content);

        return $resp;

    }

    public function response($keywords,$fromuser,$touser){
        //name,info,pic,url
        $news  =  $this->find_with_keywords($keywords);
        if(empty($news)){
            show_error('the resource did not exists by keywords '.$keywords);
            return ;
        }

        $newslist = array(

            array(
                'name'=>$news['name'],
                'info'=>$news['remark'],
                'picurl'=>$news['picurl'],
                'url'=>base_url('/'.$this->table().'/index/'.$news['id'])
            )


        );


        return  $this->buildMessage($fromuser,$touser,$newslist);
    }


}   