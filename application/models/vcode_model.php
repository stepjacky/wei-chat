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
 * FileName application/models/vcode.php
 * Created by CIscaffolding.
 * User: qujiakang
 * QQ:myqq_postor@qq.com
 * Email: qujiakang@gmail.com  
 * Date: Wed Apr 24 23:46:45 CST 2013
 *    
 */

class Vcode_model extends MY_Model {
     
    public  function __construct(){
        parent::__construct("Vcode_model");
    }  


    public function generate(){
        $romd=  array();
        for ($i = 97,$j=65; $i <= 122,$j<=90; $i++,$j++)
        {
            array_push($romd, chr($i), chr($j),rand(0,9));
        }

        $j=0;
        for($i=0;$i<=72,$j<10;$i++,$j++){
            $a =  array_slice($romd, $i,6);
            $b=array();
            $range=$this->wholerange($a,$b,$a);
            $count=$this->recursionarray($range);
            echo "总共有".$count."排列";
        }
    }









    function wholerange($a,$b,$M){
        $range=array();
        if(count($a) > 1){
            $d=$b;
            foreach($a as $value){
                $b[]=$value;
                $c=array_diff($M,$b);
                if(count($c) > 0){
                    $range[]= $this->wholerange($c,$b,$M);
                }
                $b=$d;
            }
        }elseif(count($a) == 1){
            foreach($a as $value){
                $b[]=$value;
            }
            $onerange="";
            foreach($b as $value){
                $onerange.=$value;
            }
            $range[]=$onerange;
        }
        return $range;
    }
    /**
     * 递归输出数组
     *
     * @param array $arr 待输出的数组
     * @return int 返回数组元素个数*/
    function recursionarray($arr){
        $i=0;
        foreach($arr as $value){
            if(is_array($value)){
                $i+= $this->recursionarray($value);
            }else{

                $vstr = md5($value);
                $vi   = rand(0,strlen($vstr));
                $vc   = substr($vstr,$vi,1);
                echo $value.'-'.$vstr.'-'.$vi.'-'.$vc."<br/>";

                $i++;
            }
        }
        return $i;
    }


}   