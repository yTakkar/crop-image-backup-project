<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon/">
    <title>PHP, jQuery, AJAX Image Uploading &amp; Cropping</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="overlay"></div>
    <form class="form" action="" method="post" enctype="multipart/form-data">
      <input type="file" name="file" value="Choose a file">
    <div class="wrapper">
      <img src="no_image.jpg" alt="" class="img">
      <div class="btns">
        <input type="button" name="cancel" value="Cancel" class="sec_btn">
        <input type="submit" name="submit" value="Next" class="pri_btn">
      </div>
    </div>
  </form>

  <div class="cropper">
    <img src="no_image.jpg" alt="" class="sec_img">
    <div class="crop_tool"></div>
    <div class="btns">
      <input type="button" name="Cancel" value="Cancel" class="sec_btn">
      <input type="button" name="submit" value="Apply" class="pri_btn final">
    </div>
  </div>

  <div class="output"></div>

  <div class="oop">
    <div class="oop_img">
      <img src="no_image.jpg" alt="" width="200px" height="200px">
    </div>
    <span>Your Profile:</span><br>
  </div>

  <!-- <div class="output">
    <img src="" alt="">
    <div class="btns">
      <input type="button" name='button' value='Done' class='pri_btn done'>
    </div>
  </div> -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js/master.js"></script>

  </body>
</html>
