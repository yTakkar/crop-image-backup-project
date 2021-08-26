<?php

  $top = $_POST['top'];
  $left = $_POST['left'];
  $width = $_POST['width'];
  $height = $_POST['height'];
  $name = "../".$_POST['name'];

  $dst_x = 0;
  $dst_y = 0;
  $src_x = $left;
  $src_y = $top;
  $dst_w = $width;
  $dst_h = $height;
  $src_w = $width;
  $src_h = $height;

  $ext = strtolower(end(explode('.', $name)));

  $size = getimagesize($name);
  //print_r($size);

  $dst_image = imagecreatetruecolor($dst_w, $dst_h);
  if ($ext == "gif"){
    $src_image = imagecreatefromgif($name);
    } else if($ext =="png"){
    $src_image = imagecreatefrompng($name);
  } else {
    $src_image = imagecreatefromjpeg($name);
    }

  imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

  function delete(){
    $arr = glob("../processed/cropped/*");
    foreach ($arr as $value) {
      if (@unlink($value)) {
        return true;
      } else {
        return false;
      }
    }
  }

  function return_name($ext){
    return "<img src='processed/cropped/profile.".$ext."' alt='default' class='sec_img'><div class='btns'><input type='button' name='button' value='Done' class='pri_btn done'></div>";
  }

  if ($ext == "gif"){
    delete();
    imagegif($dst_image, "../processed/cropped/profile.gif");
    echo return_name('gif');
    // echo "profile.gif";
  } else if($ext =="png"){
    delete();
    imagepng($dst_image, "../processed/cropped/profile.png");
    echo return_name('png');
    // echo "profile.png";
  } else {
    delete();
    imagejpeg($dst_image, "../processed/cropped/profile.jpg");
    echo return_name('jpg');
    // echo "profile.jpg";
  }

?>
