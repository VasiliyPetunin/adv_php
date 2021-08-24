<?php
include_once("modules/server.php");

$photoName = trim(strip_tags($_GET['img']));

$photoPage = Templater("templates/v_openIMG.php", array(
    'title' => 'Photo',
    'photo' => $photoName
));

echo $photoPage;