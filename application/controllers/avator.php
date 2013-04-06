<?php
/*
* Copyright (c) 2008 http://www.webmotionuk.com / http://www.webmotionuk.co.uk
* "PHP & Jquery image upload & crop"
* Date: 2008-11-21
* Ver 1.2
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
* IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
* PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
* STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF
* THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
*/
/**
 * Created by JetBrains PhpStorm.
 * User: 饭
 * Date: 13-2-19
 * Time: 下午10:02
 * To change this template use File | Settings | File Templates.
 */
class Avator extends Media_Controller
{

    private $upload_path = '/resources/images/uploads/'; // The path to where the image will be saved
    private $max_file = "3"; // Maximum file size in MB
    private $max_width = "500"; // Max width allowed for the large image
    private $thumb_width = "100"; // Width of thumbnail image
    private $thumb_height = "100"; // Height of thumbnail image
    // Only one of these image types should be allowed for upload
    private $allowed_image_types = array();
    private $allowed_image_ext = array(); // do not change this
    private $image_ext = ""; // initialise variable, do not change this.    ;
    private $imagewidth;
    private $imageheight;
    private $uploaded;


    public function __construct()
    {
        parent::__construct();
        $this->allowed_image_types = array('image/jpeg' => "jpg", 'image/jpg' => "jpg", 'image/png' => "png", 'image/x-png' => "png", 'image/gif' => "gif",'image/pjpeg' => "jpg");
        $this->allowed_image_ext = array_unique($this->allowed_image_types);
        foreach ($this->allowed_image_ext as $mime_type => $ext) {
            $this->image_ext .= strtoupper($ext) . " ";
        }
    }

    public function index(){
        $this->load->view("front/res-header");
        $this->load->view("avator/index");
        $this->load->view('front/res-footer');
    }


    public function upload()
    {

        $data = array();
        if (!$this->upload->do_upload("image")) {

            $this->load->view("front/res-header");
            $data['error'] = $this->upload->display_errors();
            $this->load->view("avator/index", $data);
            $this->load->view('front/res-footer');
            return;
        }
        $data = $this->upload->data();
        //Get the file information
        $userfile_name = $data['file_name'];
        $userfile_size = $data['file_size'];
        $userfile_type = $data['file_type'];
        $file_ext = $data['file_ext'];
        $file_name = $this->upload_path.$userfile_name;
        $full_name = $data['full_path'];
        foreach ($this->allowed_image_types as $mime_type => $ext) {
            //loop through the specified image types and if they match the extension then break out
            //everything is ok so go and check file size
            if ($file_ext == ".".$ext && $userfile_type == $mime_type) {
                $error = "";
                break;
            } else {
                $error = "只能上传<strong>" . $this->image_ext . "</strong> 图像类型的文件";
                echo $error;
                return;
            }

        }
        //check if the file size is above the allowed limit
        if ($userfile_size > ($this->max_file * 1048576)) {
            $error .= "文件不能超过" . $this->max_file . "MB ";
            echo $error;
            return;
        }

        $width = $this->_getWidth($full_name);
        $height = $this->_getHeight($full_name);
        //Scale the image if it is greater than the width set above
        if ($width > $this->max_width) {
            $scale = $this->max_width / $width;
            $this->uploaded = $this->_resizeImage($full_name, $width, $height, $scale);
        } else {
            $scale = 1;
            $this->uploaded = $this->_resizeImage($full_name, $width, $height, $scale);
        }


        $large_width = $this->_getWidth($full_name);
        $large_height = $this->_getHeight($full_name);

        //Refresh the page to show the new uploaded image
        $this->load->view("front/res-header");
        $data['image_src'] = $file_name;
        $data['thumb_src'] = $file_name;
        $data['large_width'] = $large_width;
        $data['large_height']= $large_height;
        $data['thumb_width'] = $this->thumb_width;
        $data['thumb_height'] = $this->thumb_height;
        $this->session->set_userdata('large_image',$full_name);
        $this->session->set_userdata('image_ext',$file_ext);

        $this->load->view("avator/upload", $data);
        $this->load->view('front/res-footer');


    }


    public function thumbnail()
    {
        //Get the new coordinates to crop the image.
        $x1 = $this->_post("x1");
        $y1 = $this->_post("y1");
        $x2 = $this->_post("x2");
        $y2 = $this->_post("y2");
        $w = $this->_post("w");
        $h = $this->_post("h");
        //Scale the image to the thumb_width set above
        $scale = $this->thumb_width / $w;
        $large_image = $this->session->userdata('large_image');
        $file_ext = $this->session->userdata('image_ext');
        $image_dir = dirname($large_image);
        $thumb_image = $image_dir.'/'.getGUID().$file_ext;
        $cropped = $this->_resizeThumbnailImage($thumb_image, $large_image, $w, $h, $x1, $y1, $scale);
        $this->session->set_userdata('thumb_image',$cropped);
        $data  = array('thumb_src'=>$this->upload_path.basename($cropped));
        $this->load->view("front/res-header");
        $this->load->view("avator/thumbnail",$data);
        $this->load->view('front/res-footer');
    }

    public function delete($t)
    {
        $large_image = $this->session->userdata('large_image');
        $thumb_image = $this->session->userdata('thumb_image');
        if (file_exists($large_image)) {
            unlink($large_image);
        }
        if (file_exists($thumb_image)) {
            unlink($thumb_image);
        }

    }


    private function _resizeImage($image, $width, $height, $scale)
    {
        list($this->imagewidth, $this->imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
        switch ($imageType) {
            case "image/gif":
                $source = imagecreatefromgif($image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source = imagecreatefromjpeg($image);
                break;
            case "image/png":
            case "image/x-png":
                $source = imagecreatefrompng($image);
                break;
        }
        imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $width, $height);

        switch ($imageType) {
            case "image/gif":
                imagegif($newImage, $image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage, $image, 90);
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage, $image);
                break;
        }
        return $image;
    }


    function _resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale)
    {

        list($this->imagewidth, $this->imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
        $newImageWidth = ceil($width * $scale);
        $newImageHeight = ceil($height * $scale);
        $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
        switch ($imageType) {
            case "image/gif":
                $source = imagecreatefromgif($image);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                $source = imagecreatefromjpeg($image);
                break;
            case "image/png":
            case "image/x-png":
                $source = imagecreatefrompng($image);
                break;
        }
        imagecopyresampled($newImage, $source, 0, 0, $start_width, $start_height, $newImageWidth, $newImageHeight, $width, $height);
        switch ($imageType) {
            case "image/gif":

                imagegif($newImage, $thumb_image_name);
                break;
            case "image/pjpeg":
            case "image/jpeg":
            case "image/jpg":
                imagejpeg($newImage, $thumb_image_name, 90);
                break;
            case "image/png":
            case "image/x-png":
                imagepng($newImage, $thumb_image_name);
                break;
        }
        return $thumb_image_name;
    }


    function _getHeight($image)
    {
        $size = getimagesize($image);
        $height = $size[1];
        return $height;
    }

    function _getWidth($image)
    {
        $size = getimagesize($image);
        $width = $size[0];
        return $width;
    }
}