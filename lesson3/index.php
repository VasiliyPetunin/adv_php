<?php
include_once("modules/server.php");

$images = array_slice(scandir("images"), 2);

$mainPage = Templater("templates/v_main.php", array(
    'title' => 'Photogalery',
    'photos' => $images
));

echo $mainPage;