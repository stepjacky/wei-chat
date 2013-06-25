<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 13-6-25
 * Time: 下午10:22
 * To change this template use File | Settings | File Templates.
 */

$string = '1 2 3 4 5 6 7 8 9 ABCDEF G' ;
$font_size = 5 ;
$width = imagefontwidth ( $font_size )* strlen ( $string );
$height = imagefontheight ( $font_size )* 2 ;
$img = imagecreate ( $width , $height );
$bg = imagecolorallocate ( $img , 225 , 225 , 225 );
$black = imagecolorallocate ( $img , 0 , 0 , 0 );
$len = strlen ( $string );

for( $i = 0 ; $i < $len ; $i ++)
{
    $xpos = $i * imagefontwidth ( $font_size );
    $ypos = rand ( 0 , imagefontheight ( $font_size ));
    imagechar ( $img , $font_size , $xpos , $ypos , $string , $black );
    $string = substr ( $string , 1 );

}
header ( "Content-Type: image/gif" );
imagegif ( $img );
imagedestroy ( $img );