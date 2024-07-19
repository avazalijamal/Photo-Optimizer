<?php

require_once "./IMAGELOGO.php";

$IM = new IMAGELOGO("./logo/azer-gold.png");

$directory = './src';

$IM->directoryContentOptimization($directory);
?>