<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-13
 * Time: 下午2:29
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends CI_Controller
{

    protected $data = array();
    protected $userid = '';
    public function __construct(){
         parent::__construct();

         $this->load->library('firephp');
         $this->load->helper('url');
         $this->load->helper('file');
         $this->load->helper('form');
         $this->load->helper('guid');
         $this->load->helper('html');
         $this->load->library('pagination');
         $this->load->library('form_validation');
         $this->load->library('upload');
         $this->load->helper('date');
         $this->load->library('nsession');
         $this->load->helper('cookie');
         $this->load->driver('cache');
        if(func_num_args()==1){
            $mName=func_get_arg(0);
            $this->load->model($mName,"dao");
        }



        $user = $this->nsession->userdata('user');
        $this->userid = $user?$user['id']:NULL;

    }

    public function search($key,$page=1,$rows=10){
        $fields = $this->_post('fields');
        if(!strpos($fields,',')){
            $fields = array($fields);
        }else{
            $fields = explode(',',$fields);
        }

        $data =  $this->dao->search($fields,$key,$page,$rows);
        $this->load->view($this->dao->table().'/search-result',$data);
    }

    public function lists($page=1,$rows=10){


        $result =  $this->dao->gets($page,$rows);

        $pagelink = $this->dao->page_link($page);
        $data['datasource'] = $result;
        $data['pagelink']=$pagelink;
        $this->load->view($this->dao->table()."/list",$data);

    }

    public function find_all($type='raw'){
        if($this->__invalidparam($type) &&  strtolower($type)=='json'){
            echo json_encode($this->dao->find_all());
            return ;
        }
        return $this->dao->find_all();
    }


    public function list_with_paged($page=1){

        $data = $this->dao->list_with_paged($page);

        $this->load->view($this->dao->table().'/selector-list',$data);
    }
    public function saveUpdate($pk='id'){
         $data =  $this->_xsl_post();
         $this->dao->saveUpdate($data,$pk);
         $this->_end();
    }

    public function remove($id,$pk='id'){
        $id = urldecode($id);
        $this->dao->remove($id,$pk);
        $this->_end();
    }
    /**
      * 新增
      */
    public function editNew($id=-1,$pk='id'){

        $id=urldecode($id);
        $data = array();
        if($id!=-1){
           $data = $this->dao->get($id,$pk);
        }
        $this->load->view("admin/res-head");
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer");
    }

    public function selector(){
        $this->load->view('admin/header-pure');
        $this->load->view($this->dao->table()."/selector");
        $this->load->view('admin/footer-pure');
    }


    public function toggle($prop,$id){
        $this->dao->toggle_prop($prop,$id);
    }



    public function update_picture($pname,$id){

        $data = array(
            'id'=>$id,
            $pname=>$this->_post('path')
        );
        $this->dao->update($data);
    }

    public function pages($page){
        $this->load->view($this->dao->table()."/".$page);
    }

    public function download($filename){

        header("Content-type: application/octet-stream");//FILE流
        header("Accept-Ranges: bytes");
        header("Accept-Length: 1024");//提示将要接收的文件大小
        header("Content-Disposition: attachment; filename=$filename"); //提示终端浏览器下载操作
    }

    protected  function _xsl_post(){
        return $this->input->post(NULL,TRUE);
    }

    protected  function _no_xsl_post(){
        return $this->input->post();
    }

    protected function _get($name){
        return $this->input->get($name, TRUE);
    }

    protected function _xls_get(){
        return $this->input->get(NULL, TRUE);
    }

    protected function _post($name){
        return $this->input->post($name, TRUE);
    }

    protected function _post_no_xsl($name){
        return $this->input->post($name);
    }
    protected function _post_exists($key,&$data){
        if(!isset($data[$key]) || !$data[$key]) return FALSE;
        return TRUE;

    }

    protected  function _end()    {

        $this->load->view("common/result-close");
    }

    public   function __user_header(&$data){
       // $my_lang = $this->nsession->userdata('locale');
        //if(!$my_lang) $my_lang='zh-cn';
        $this->load->view("front/header",$data);
       // $this->load->view("front/menu/".$my_lang."/header",$data);

    }





    protected function _objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        }
        else {
            // Return array
            return $d;
        }
    }
    public function fireLog($msg=""){
        $this->firephp->log($msg);
    }

    function __invalidparam($param){
        if(!isset($param) || $param=="" || $param==null || $param=='null')return false;
        return true;
    }
}

class Media_Controller extends MY_Controller{
    public function __construct(){


        if(func_num_args()==1){
            $mName=func_get_arg(0);
           parent::__construct($mName);
        }else{
            parent::__construct();
        }

    }

    public function update_picture_extra($pk='id',$pkvalue,$field){
        $path = $this->_post('path');
        $this->dao->update_picture_extra($path,$pk,$pkvalue,$field);
    }

}

class Picture_Controller extends Media_Controller {

    public function __construct(){

        if(func_num_args()==1){
            $mName=func_get_arg(0);
            parent::__construct($mName);
        }else{
            parent::__construct();
        }



    }
    public function index($id=FALSE){
        //$data = $this->dao->get($id);
        $data = array(
            "merchant"=>$this->userid
        );
        //$this->load->view("admin/header-pure");
        $this->load->view($this->dao->table()."/index",$data);
        //$this->load->view("admin/footer-pure");
    }
    public function add_picture($ptype,$merch=FALSE){

        //echo $ptype;
        if(!isset($ptype)) return;
        if (!$this->upload->do_upload('Filedata'))
        {
            $error = array('error' => $this->upload->display_errors("<p>","</p>"));

            //print_r($error);
            $this->load->view('common/result', $error);
        }
        else
        {
            $fileData = $this->upload->data();

            $data = array(
                'name'=>$fileData['client_name'],
                'width'=>$fileData['image_width'],
                'height'=>$fileData['image_height'],
                "path"=>"/resources/images/uploads/".$fileData['file_name'],
                'ptype'=>$ptype

            );


            if($merch){
                $data["merchant_id"]=$merch;
            }

            $this->fireLog($fileData);
            $this->dao->saveUpdate($data);
            $data = array('Filedata' => $fileData,"code"=>"success","edata"=>$data);

            $this->load->view('common/result', $data);
        }
    }




    public function thumbnails($ptype,$merch=FALSE,$page=1){
        $data = array();
        $data['ptype'] = $ptype;
        $where = array();
        if($merch){
            $where['merchant_id'] = $this->userid;
        }
        $beans = $this->dao->find_by_type($ptype,$where,$page);
        $pagelink = $this->dao->create_page_link('ptype',$ptype,$where,$page);

        $data['beans']     = $beans;
        $data['pagelink']  = $pagelink;
        $this->load->view($this->dao->table()."/thumbnails",$data);
    }

    public function selector_thumbnails($ptype,$merch=FALSE,$page=1){
        $data = array();
        $data['ptype'] = $ptype;
        $where = array();
        if($merch){
            $where['merchant_id'] = $this->userid;
        }
        $beans = $this->dao->find_by_type($ptype,$where,$page);
        $pagelink = $this->dao->create_page_link('ptype',$ptype,$where,$page);

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
        $this->load->view($this->dao->table().'/selector');
    }

    public function input(){
        $this->load->view('admin/header-pure');
        $this->load->view($this->dao->table().'/input');
    }
    public function selector_list($page=1){
        $data =  $this->dao->find_by_selector($page,10);
        $this->load->view($this->dao->table().'/selector-list',$data);
    }

}

class Respmessage_Controller extends MY_Controller{

    protected $FromUserName = '';
    public function __construct(){

        if(func_num_args()==1){
            $mName=func_get_arg(0);
            parent::__construct($mName);
        }else{
            parent::__construct();
        }
        $wx = $this->nsession->userdata('pubwx');
        $this->FromUserName = $wx;
        $this->load->model("Pubweixin_model", "pubdao");
    }

    /**
     * 新增编辑
     */
    public function editNew($id=FALSE){

        $data = $this->dao->get($id);
        $this->initUserData($data);
        $this->load->view("admin/header");
        $this->load->view("message/body-start",$data);
        $this->load->view($this->dao->table()."/editNew",$data);
        $this->load->view("admin/footer");
    }


    public function saveUpdate(){
        $data =  $this->_xsl_post();
        $this->dao->saveUpdate($data);
        $this->_end();
    }

    protected function initUserData(&$data){
        (!$this->userid) AND redirect('welcome/bizlogin');
        $pubwx = $this->pubdao->get($this->FromUserName,"weixin_id");
        $data['pubwx'] = $pubwx;
        $data['loginuser'] = $this->userid;
    }
}