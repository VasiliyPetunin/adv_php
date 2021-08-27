<?php
require_once ('modules/db.php');
require_once ('Twig/Autoloader.php');
Twig_Autoloader::register();

if ($_POST['PROD']) {
    $prodId = $_POST['PROD'];
    require ('modules/server.php');

    try {
        $loader = new Twig_Loader_Filesystem('templates');

        $twig = new Twig_Enviroment($loader);

        $template = $twig->loadTemplate('v_ajax.tmpl');

        $content = $template->render(array(
            'products' => $products
        ));

        echo json_encode($content);
    }   catch (Exception $e) {
        die ('ERROR: '.$e->getMessage());
    }
}