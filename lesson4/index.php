<?php
$id = $_GET['id'] ? $_GET['id'] : 0;
require ('modules/server.php');
require_once ('Twig/Autoloader.php');
Twig_Autoloader::register();

try {
    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Enviroment($loader);

    $template = $twig->loadTemplate('v_index.tmpl');

    $content = $template->render(array(
        'products' => $products
    ));

    echo $content;
}   catch (Exception $e) {
    die ('ERROR: '.$e->getMessage());
}