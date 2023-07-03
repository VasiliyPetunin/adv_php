<?php

class Basket extends Model
{
    protected $table = 'basket';
    protected $basket = [];
    protected $totalCost = 0;
    protected $isInit = 0;

    function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    function init() {

        if ($this->isInit == 0) {
            if ($_SESSION['basket'] != 0) {
                $itemsId = explode("/", $_SESSION['basket']);
                foreach ($itemsId as $itemId) {
                    array_push($this->basket, db::getInstance()->Select('SELECT id, name, price FROM `goods` WHERE status=:status AND id = :id', ['status' => Status::Active, 'id' => $itemId]));
                    $addedItemNumber = count($this->basket) - 1;
                    $countProduct = 'countProduct'.$itemId;
                    $this->basket[$addedItemNumber]['count'] = (int)$_SESSION[$countProduct];
                }
            }
            $this->isInit = 1;
        }

    }

    function totalCost() {
        foreach($this->basket as $good) {
            $this->totalCost = $this->totalCost + $good['price'] * $good['count'];
        }
        return $this->totalCost;
    }

    protected function checkItem($id) {
        foreach ($this->basket as $good) {
            if ($good['id'] == $id) {
                return true;
            }
        }
        return false;
    }

    function showBasket()
    {
        if (count($this->basket) != 0) {
            return $this->basket;
        } else {
            return "Cart is empty.";
        }
    }

    function deleteIdFromSession($id) {
        $itemsId = explode("/", $_SESSION['basket']);
        for ($i = 0; $i < $itemsId; $i++) {
            if ($itemsId[$i] == $id) {
                unset($itemsId[$i]);
                $_SESSION['busket'] = implode ('/', $itemsId);
                $countProduct = 'countProduct'.$id;
                unset($_SESSION[$countProduct]);
            }
        }
    }

    function deleteAllIdFromSession() {
        $itemsId = explode("/", $_SESSION['basket']);
        for ($i = 0; $i < $itemsId; $i++) {
            $countProduct = 'countProduct'.$itemsId[$i];
            unset($_SESSION[$countProduct]);
        }
    }

    function addToCart($id)
    {
        if (strlen($_SESSION['basket']) > 0) {
            if (checkItem($id)) {
                increaseCount($id);
                return "Product has successfully added to cart.";
            }
            $basketCount = count($this->basket);
            array_push($this->basket, db::getInstance()->Select('SELECT id, name, price FROM `goods` WHERE status=:status AND id = :id', ['status' => Status::Active, 'id' => $id]));
            if (count($this->basket) <= $basketCount) {
                return "Adding product to the cart has failed";
            }
            $addedItemNumber = count($this->basket) - 1;
            $this->basket[$addedItemNumber]['count'] = 1;
            $_SESSION['basket'] = $_SESSION['basket']."/".(int)$id;
            $countProduct = 'countProduct'.$id;
            $_SESSION[$countProduct] = 1;
            return "Product has successfully added to cart.";
	    }

        if (strlen($_SESSION['basket']) == 0) {
            array_push($this->basket, db::getInstance()->Select('SELECT id, name, price FROM `goods` WHERE status=:status AND id = :id', ['status' => Status::Active, 'id' => $id]));
            if (count($this->basket) == 0) {
                return "Adding product to the cart has failed";
            }
            $this->basket[0]['count'] = 1;
            $_SESSION['basket'] = (int)$id;
            $countProduct = 'countProduct'.$id;
            $_SESSION[$countProduct] = 1;
            return "Product has successfully added to cart.";
	    }

    }

    function increaseCount($id) {
        foreach($this->basket as $good) {
            if ($good['id'] == $id) {
                $good['count'] = $good['count'] + 1;
                $countProduct = 'countProduct'.$id;
                $_SESSION[$countProduct] = (int)$good['count'];
                break;
            }
        }
    }

    function decreaseCount($id) {
        foreach($this->basket as $good) {
            if ($good['id'] == $id) {
                $good['count'] = $good['count'] - 1;
                if ($good['count'] == 0) {
                    deleteFromCart($id);
                } else {
                    $countProduct = 'countProduct'.$id;
                    $_SESSION[$countProduct] = (int)$good['count'];
                }
                break;
            }
        }
    }

    function deleteFromCart($id) {
        $goodsInCart = count($this->basket);
        for ($i = 0; $i < $goodsInCart; $i++) {
            if ($this->basket[$i]['id'] == $id) {
                unset($this->basket[$i]);
                deleteIdFromSession($id);
            }
        }
    }

    function clearCart() {
        deleteAllIdFromSession();
        $_SESSION['basket'] = 0;
        $this->basket = [];
        $this->totalCost = 0;
    }

}