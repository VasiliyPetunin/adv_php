<?php

class BasketController extends Controller
{
    public $view = 'basket';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | basket';
    }

    function index($data)
    {
        return Basket::showBasket();
    }

    function increaseProductCount($data)
    {
        Basket::increaseCount($data['id']);
        header("Location: index.php?path=Basket/index");
    }

    function decreaseProductCount($data)
    {
        Basket::decreaseCount($data['id']);
        header("Location: index.php?path=Basket/index");
    }

	//метод, который отправляет в представление информацию в виде переменной content_data
	function addItem($data)
    {
        return Basket::addToCart($data['id']);
	}

    function deleteProduct($data)
    {
        Basket::deleteFromCart($data['id']);
        header("Location: index.php?path=Basket/index");
    }

    function deleteAll($data)
    {
        Basket::clearCart();
        header("Location: index.php?path=Basket/index");
    }

}