<?php
  function profile(){
    $arr = glob("processed/cropped/*");
    foreach ($arr as $value) {
      if ($value) {
        return "<img src='". $value ."'>";
      } else {
        return "<img src='../default.png'>";
      }
    }
  }

  echo profile();
  echo __DIR__;
  // function name(){
  //   $arr = glob("../processed/cropped/*");
  //   foreach ($arr as $value) {
  //     return $value;
  //   }
  // }
  //
  // if (file_exists(profile())) {
  //   echo "<img src='". name() ."'>";
  // } else {
  //   echo "<img src='../default.png'>";
  // }

?>
