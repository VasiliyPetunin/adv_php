<?php
require_once("classes/Product.php");

class PersonalComputer extends Product {
    protected $operatingSystem; // ОС, установленная на компьютере
    protected $processor; // Процессор, установленный в компьютер
    protected $graphicsCard; // Видеокарта, установленная в компьютер
    protected $countRAMMemory; // Кол-во оперативной памяти

    public function _construct($title, $description, $price, $inStock, $operatingSystem, $processor, $graphicsCard, $countRAMMemory) {
        parent::_construct($title, $description, $price, $inStock);
        $this->operatingSystem = $operatingSystem;
        $this->processor = $processor;
        $this->graphicsCard = $graphicsCard;
        $this->countRAMMemory = $countRAMMemory;
    }

    function getOperatingSystem() {
        return $this->operatingSystem;
    }

    function getProcessor() {
        return $this->processor;
    }

    function getGraphicsCard() {
        return $this->graphicsCard;
    }

    function getCountRAMMemory() {
        return $this->countRAMMemory;
    }

    function showComputer() {
        echo "ОС, установленная на компьютере: ".$this->operatingSystem.".<br>";
        echo "Процессор, установленный в компьютер: ".$this->processor.".<br>";
        echo "Видеокарта, установленная в компьютер: ".$this->graphicsCard.". <br>";
        echo "Кол-во оперативной памяти: ".$this->countRAMMemory."ГБ.<br>";
    } // Метод, описывающий товар

    function showComputerAll() {
        $this->showProduct();
        $this->showComputer();
        $this->showBuyingInfo();
    } // Метод, демонстрирующий полную информацию о товаре
}