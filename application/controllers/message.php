<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
 * FileName application/controllers/message.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Thu Apr 25 21:40:09 CST 2013
 *    
 */

class Message extends MY_Controller
{

    public function __construct()
    {
        parent::__construct("Message_model");
        $this->load->model("Pubweixin_model", "pubdao");
        $this->load->model("Subscribemessage_model", "subdao");
        $this->load->model("Member_model", "mbrdao");

    }

    public function setting($weixin)
    {

        $pubwx = $this->pubdao->get($weixin,"weixin_id");
        $data['pubwx'] = $pubwx;
        $this->nsession->set_userdata('pubwx',$weixin);
        $this->load->view("message/index",$data);
    }

    public function index($id = FALSE)
    {
        if (@$GLOBALS["HTTP_RAW_POST_DATA"]) {
            $this->responseMsg();
        } else {
            $token = $this->pubdao->get_token($id);
            $this->valid($token);
        }

    }


    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //extract post data

        if (!empty($postStr)) {

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $msgType = trim($postObj->MsgType);
            $resultStr="台州微生活,输入优惠券,显示优惠信息";
            switch ($msgType) {
                case "text":
                    $resultStr = $this->proceedMessage($postObj);
                    break;
                case "event":
                    $resultStr = $this->proceedEvent($postObj);
                    break;
                default:
                    $resultStr = "unknow msg type: " . $msgType;
                    break;
            }
            echo $resultStr;

        } else {
            echo "";
            exit;
        }
    }

    private function proceedMessage($object)
    {

        $keyword = trim($object->Content);
        $tablename = $this->dao->find_tablename_of_keyword($keyword);
        if(!$tablename) {
            show_error(sprintf("keyword %s does exists any tables ",$keyword));
            return "";
        }
        $this->fireLog($tablename);

        $this->load->model(sprintf("%s_model",ucfirst($tablename)), "respdao");
        $resultStr = $this->respdao->response($keyword,$object->ToUserName,$object->FromUserName);
        return $resultStr;
    }

    private function proceedEvent($object)
    {
        $resultStr="";
        switch ($object->Event) {
            case "subscribe":{
                $touser = $object->FromUserName;
                $fromuser  = $object->ToUserName;
                $resultStr = $this->subdao->response('', $fromuser, $touser);
                $mdata = array(
                    'weixin'=>$touser,
                    'pubweixin_id'=>$fromuser
                );
                $this->mbrdao->add_user($mdata);
                break;
            }
        }

        return $resultStr;
    }



    private function checkSignature($token)
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }


    public function valid($token)
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if ($this->checkSignature($token)) {
            echo $echoStr;
            exit;
        }
    }


}