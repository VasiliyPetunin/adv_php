<?php

Class CatalogController extends Controller
{
    public $view = 'catalog';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | catalog';
    }

    //метод, который отправляет в представление информацию в виде переменной content_data
	function catalog($data){
        return Catalog::getGoods();
   }
}