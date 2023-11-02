<?php

$image = new Imagick('./images/11.png');

$defaultWidth = 620;

$defaultHeight = 466;

$AspectRation = $defaultWidth/$defaultHeight;

// Function to get the width of image 
$width = $image->getImageWidth(); 

// Function to get the height of image 
$height = $image->getImageHeight(); 

$currentR = $width/$height;

if($currentR <= $AspectRation){

    $image->scaleImage($currentR * $defaultWidth, $defaultHeight, Imagick::FILTER_LANCZOS);

} else{

    $image->scaleImage($defaultWidth, $defaultWidth / $currentR, Imagick::FILTER_LANCZOS);

}

$image->setCompressionQuality(80);

$image->setImageFormat('jpeg');

$image->setImageBackgroundColor('white');

$image->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE);

$image->mergeImageLayers(imagick::LAYERMETHOD_FLATTEN);

$image->writeImage('./scaled-images/scaled_image.jpg');