<?php

Class ProductController extends Controller
{
    public $view = 'product';
    public $title;

    function __construct()
    {
        parent::__construct();
    }

    //метод, который отправляет в представление информацию в виде переменной content_data
    public static function show($data)
    {
        return Product::showItem($data['id']);
    }
}