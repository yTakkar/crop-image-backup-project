<?php
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest") {
    if (isset($_FILES['file'])) {
      $name = $_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $ext = end(explode(".", $name));
      if (move_uploaded_file($tmp_name, "../processed/big/Uploaded_".$name)) {
        include 'gd_library.php';
        $old = "../processed/big/Uploaded_$name";
        $new = "../processed/resized/Resized_$name";
        $wmax = 450;
        $hmax = 450;
        resize($old, $new, $wmax, $hmax, $ext);
        $folder = substr($new, 0, strrpos($new, '/'));
        $array = array(
          'folder' => $folder,
          'name'   => $name
        );
        echo json_encode($array);
      }
    }
  }

?>
