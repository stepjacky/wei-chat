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
        $this->load->model("Respnewsmessage_model", "respnewsdao");
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


            if (@$_GET["timestamp"]) {
                $token = $this->pubdao->get_token($id);
                $this->valid($token);
            } else {
                echo "php is ok this is new 2013-3-6<br>";
                if (function_exists('curl_init')) {
                    echo "curl_init is ok<br>";
                } else {
                    echo "no curl_init <br>";
                }
                if (function_exists('fsockopen')) {
                    echo "fsockopen is ok<br>";
                } else {
                    echo "fsockopen is no<br>>";
                }
                if (function_exists('file_get_contents')) {
                    echo "file_get_contents is ok <br>";
                } else {
                    echo "file_get_contents is not ok<br>";
                }
            }
        }

    }

    /**
     * 新增编辑
     */
    public function editNew($id = FALSE)
    {

        $data = $this->dao->get($id);

        $this->load->view("admin/header-pure");
        $this->load->view($this->dao->table() . "/editNew", $data);
        $this->load->view("admin/footer-pure");
    }

    public function fireware($oldwweixin)
    {
        $token = $this->pwDao->get_token($oldwweixin);
        $this->weichat->valid($token);
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

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //extract post data
        if (!empty($postStr)) {

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $msgType = trim($postObj->MsgType);
            switch ($msgType) {
                case "text":
                    $resultStr = $this->receiveText($postObj);
                    break;
                case "event":
                    $resultStr = $this->receiveEvent($postObj);
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

    private function receiveText($object)
    {

        $keyword = trim($object->Content);
        if ($keyword == "优惠券") {
            $resultStr = $this->respnewsdao->response($keyword,$object->FromUserName);
            return $resultStr;
        } else {

        }
    }

    private function receiveEvent($object)
    {
        $contentStr = "";
        switch ($object->Event) {
            case "subscribe":{
                $data = $this->subdao->get($object->ToUserName);
                $contentStr = $data['content'];
                $resultStr = $this->transmitText($object, $contentStr);
                $mdata = array(
                    'weixin'=>$object->FromUserName,
                    'fromusername'=>$object->ToUserName
                );
                $this->mbrdao->persiste($mdata);
                break;
            }
        }

        return $resultStr;
    }

    private function transmitText($object, $content, $flag = 0)
    {
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>%d</FuncFlag>
</xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
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


}