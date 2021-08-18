<?php

class Product {
    protected $title; // Название товара
    protected $description; // Описание товара
    protected $price; // Стоимость товара
    protected $inStock; // Количество данного товара на складе

    public function _construct($title, $description, $price, $inStock) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->inStock = $inStock;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrice() {
        return $this->price;
    }

    function getInStock() {
        return $this->inStock;
    }

    function showProduct() {
        echo "Название товара: ".$this->title.".<br>";
        echo "Описание товара: ".$this->description.".<br>";
    } // Метод, описывающий товар

    function showBuyingInfo() {
        echo "Стоимость товара: ".$this->price."руб. <br>";
        echo "В наличии: ".$this->inStock.".<hr>";
    } // Метод, показывающий информацию, относящуюся к покупке товара

    function showProductAll() {
        $this->showProduct();
        $this->showBuyingInfo();
    } // Метод, демонстрирующий полную информацию о товаре
}