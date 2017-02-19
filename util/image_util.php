<?php
  function create_thumbnail($imgFile, $tnPath, $thumbWidth = 100) {
    $info = pathinfo($imgFile);

    if(strtolower($info['extension']) == 'jpg' || strtolower($info['extension']) == 'jpeg') {
      $img = imagecreatefromjpeg($imgFile);
      $width = imagesx($img);
      $height = imagesy($img);

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagejpeg($tmp_img, $tnPath . basename($imgFile, ".jpg") . "-tn.jpg");
    }
    else if(strtolower($info['extension']) == 'gif') {
      $img = imagecreatefromgif($imgFile);
      $width = imagesx($img);
      $height = imagesy($img);

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagegif($tmp_img, $tnPath . basename($imgFile, ".gif") . "-tn.gif");
    } else if(strtolower($info['extension']) == 'png') {
      $img = imagecreatefrompng($imgFile);
      $width = imagesx($img);
      $height = imagesy($img);

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagepng($tmp_img, $tnPath . basename($imgFile, ".png") . "-tn.png");
    }
  }
?>