<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 12-12-3
 * Time: 下午10:30
 * To change this template use File | Settings | File Templates.
 */
class Qqlogin  extends MY_Controller {
    public  function __construct(){
        parent::__construct();
        $this->load->model("Myuser_model","dao");
    }
     public function index(){
         $appId = "100339887";
         $secuKey="df45b4314e6fffccbff01a22f284dceb";
         $code = $this->_get("code");
         $siteurl="http://www.bsphone.com/qqlogin";
         $gettoken="https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=$appId&client_secret=$secuKey&code=$code&state=bsstate&redirect_uri=".urlencode("$siteurl");
         $response = file_get_contents($gettoken);
         $data = array();
         if (strpos($response, "callback") !== false) {
             $lpos = strpos($response, "(");
             $rpos = strrpos($response, ")");
             $response  = substr($response, $lpos + 1, $rpos - $lpos -1);
             $msg = json_decode($response);
             if (isset($msg->error))
             {
                $error = "<h3>error:</h3>" . $msg->error."<h3>msg  :</h3>" . $msg->error_description;
                 $this->fireLog($error);
                 exit;
             }
         }else{
            $params = array();
            parse_str($response, $params);
            $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=".$params['access_token'];
            $str  = file_get_contents($graph_url);
            if (strpos($str, "callback") !== false)
            {
                $lpos = strpos($str, "(");
                $rpos = strrpos($str, ")");
                $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
            }
            //gey openid
            $user = json_decode($str);
            if (isset($user->error))
            {
                $error = "<h3>error:</h3>" . $user->error."<h3>msg  :</h3>" . $user->error_description;
                $this->fireLog($error);
                exit;
            }else{
                $puser = $this->dao->getByQQOpenId($user->openid);
                if(!$puser){
                    //用户未注册过
                    $api = "get_user_info";
                    $token=$params['access_token'];
                    $openId = $user->openid;
                    $apiurl="https://graph.qq.com/user/$api?access_token=$token&oauth_consumer_key=$appId&openid=$openId";
                    $str = file_get_contents($apiurl);
                    $user=json_decode($str);
                    $data['user'] = $user;
                    $userdata = array(
                        "id"=>$user->nickname,
                        "qq_openid"=>$openId,
                        "avatar"=>$user->figureurl,
                        "qq_token"=>$token,
                        "maled"=>$user->gender=="男",
                        "name"=>$user->nickname,
                        "nick"=>$user->nickname
                    );
                    $this->dao->save($userdata);
                    $this->session->set_userdata('user', $userdata);
                }else{
                    $this->session->set_userdata('user', $puser);
                }
            }


         }
         //print_r($data['user']);
         $this->__user_header($data);
         $this->load->view("qqlogin/login");
     }

}
