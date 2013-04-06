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

        if(func_num_args()==1){
            $mName=func_get_arg(0);
            $this->load->model($mName,"dao");
        }

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
        $this->load->view('admin/res-head');
        $this->load->view($this->dao->table()."/selector");
        $this->load->view('admin/footer');
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

    protected  function _end($msg="")
    {
        $vdata['message'] = (!$msg)?"操作完成":$msg;
        $this->load->view("common/result", $vdata);
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