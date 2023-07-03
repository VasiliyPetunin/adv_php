<?php
require_once("classes/Computer.php");

class Notebook extends Computer {
    protected $batteryType; // Тип аккумулятора
    protected $batteryCapacity; // Ёмкость аккумулятора
    protected $weight; // Вес ноутбука

    public function _construct($title, $description, $price, $inStock, $operatingSystem, $processor, $graphicsCard, $countRAMMemory, $batteryType, $batteryCapacity, $weight) {
        parent::_construct($title, $description, $price, $inStock, $operatingSystem, $processor, $graphicsCard, $countRAMMemory);
        $this->batteryType = $batteryType;
        $this->batteryCapacity = $batteryCapacity;
        $this->weight = $weight;
    }

    function getBatteryType() {
        return $this->batteryType;
    }

    function getBatteryCapacity() {
        return $this->batteryCapacity;
    }

    function getWeight() {
        return $this->weight;
    }

    function showNotebook() {
        echo "Тип аккумулятора: ".$this->batteryType.".<br>";
        echo "Ёмкость аккумулятора: ".$this->batteryCapacity."Вт*ч.<br>";
        echo "Вес ноутбука: ".$this->weight."КГ.<br>";
    } // Метод, описывающий товар

    function showNotebookAll() {
        $this->showProduct();
        $this->showComputer();
        $this->showNotebook();
        $this->showBuyingInfo();
    } // Метод, демонстрирующий полную информацию о товаре
}