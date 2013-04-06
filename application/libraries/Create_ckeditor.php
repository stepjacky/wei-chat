<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 12-11-16
 * Time: 下午10:47
 * To change this template use File | Settings | File Templates.
 */
 require_once $_SERVER['DOCUMENT_ROOT'] . '/resources/ckeditor/ckeditor.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . '/resources/ckfinder/ckfinder.php';

class Create_ckeditor
{
    function createEditor($config = array())
    {
        $js_url = base_url() . '/resources/';

        $editor = new CKEditor();
        $editor->basePath             = $js_url . 'ckeditor/';
        $editor->returnOutput         = TRUE;
        $editor->config               = $config;
        $editor->config['value']      = isset($config['value']) ? $config['value'] : '';
        $editor->config['name']       = (isset($config['name'])&&$config['name']!='') ? $config['name'] : 'myeditor';
        $editor->config['language']   = isset($config['language']) ? $config['language'] : 'zh-cn';
        $editor->config['width']      = isset($config['width']) ? $config['width'] : '100%';
        $editor->config['height']     = isset($config['height']) ? $config['height'] : '200';
        $editor->config['filebrowserBrowseUrl']           = $js_url . 'ckfinder/ckfinder.html';
        $editor->config['filebrowserImageBrowseUrl']      = $js_url . 'ckfinder/ckfinder.html?Tylpe=Images';
        $editor->config['filebrowserFlashBrowseUrl']      = $js_url . 'ckfinder/ckfinder.html?Tylpe=Flash';
        $editor->config['filebrowserUploadUrl']           = $js_url . 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        $editor->config['filebrowserImageUploadUrl']      = $js_url . 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        $editor->config['filebrowserFlashUploadUrl']      = $js_url . 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

        CKFinder::SetupCKEditor($editor, $js_url .'ckfinder/');

        $str_editor = $editor->editor($editor->config['name'], $editor->config['value'] );
        return $str_editor;
    }
}
