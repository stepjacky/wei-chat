<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-27
 * Time: 下午4:56
 * To change this template use File | Settings | File Templates.
 */
function form_dropdown2($name = '', $options = array(), $selected = ""){
    $dom = "<select id='$name' name='$name'>";

    foreach($options as $opt){
        $seldom = "";
        if($opt['id']==$selected){
            $seldom="selected";
        }

        $dom.="<option value='".$opt['id']."' $seldom>".$opt['name']."</option>";
    }

    $dom.="</select>";
    echo $dom;
}

function val($val){
    if(isset($val)) return $val;
    return '';
}

function val3($val,$cval,$clabel,$rlabel=''){

    if(!isset($val)) return '';
    return $val==$cval?$clabel:$rlabel;
}

function form_tip_label($text,$label){
    if(!isset($text) || $text=='' || $text==null) {
        echo "<i class='icon-remove'></i>";
        return;
    }
    $ctrl = "<label class='label label-info' title='".$text."' >".$label."</label>";
    echo $ctrl;
}

function form_is_select($val){
    if(!isset($val) || $val=='' || $val==null) {
        echo "<i class='icon-ok-circle'></i>";
        return;
    }

    echo "<i class='icon-remove-sign'></i>";


}

function form_you_ku($url){
    if(!isset($url) || $url=='' || $url==null) {
        echo "<i class='icon-remove-circle'></i>";
        return;
    }

    $str="<button class='btn btn-success youku' youku='".$url."'><i class='icon-play'></i></button>";
    echo $str;
}