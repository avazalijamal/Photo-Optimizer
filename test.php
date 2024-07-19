<?php

    require_once "./IMAGELOGO.php";

    $IM = new IMAGELOGO("./logo/azer-gold.png");

    $uri = [
        "./photo/samples/photo-1.jpg",
        "./photo/core/photo-1.jpg"
    ];
    $newUri = [
        "./dist/samples/photo-1.webp",
        "./dist/core/photo-1.webp"
    ];

    $IM->readImage($uri[0])->writeWebp($newUri[0]);
    $IM->readImage($uri[1])->writeWebp($newUri[1]);

?>