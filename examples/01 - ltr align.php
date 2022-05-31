<?php
// call Write_To_Image
require_once '../src/Write_To_Image.php';
$image = new Write_To_Image('img.jpg');

// add text
$image->text_ltr("hi 01", 25, 50, 50, array(0,0,0), dirname(__FILE__) . "/arial.ttf");
$image->text_ltr("hi 02", 25, 250, 250, array(0,0,0), dirname(__FILE__) . "/arial.ttf");

// preview image on browser
$image->preview();
?>