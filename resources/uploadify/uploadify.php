<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/resources/images/uploads'; // Relative to the root

///$verifyToken = md5('unique_salt' . $_POST['timestamp']);
//&& $_POST['token'] == $verifyToken
if (!empty($_FILES) && isset($_POST['phone_id'])) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    // Validate the file type
    $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);
    $filefullname = getGUID().".".$fileParts['extension'];
    $targetFile = rtrim($targetPath,'/') . '/' . $filefullname;

    $path=$targetFolder."/".$filefullname;



    if (in_array($fileParts['extension'],$fileTypes)) {
        echo $targetFile;
        move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}

function getGUID(){

    mt_srand((double)microtime()*10000);
    //optional for php 4.2.0 and up.
    $charid = strtoupper(md5(uniqid(rand(), true)));
    $hyphen = chr(45);// "-"
    $uuid = chr(123)// "{"
        .substr($charid, 0, 8).$hyphen
        .substr($charid, 8, 4).$hyphen
        .substr($charid,12, 4).$hyphen
        .substr($charid,16, 4).$hyphen
        .substr($charid,20,12)
        .chr(125);// "}"
    return $uuid;
}
?>