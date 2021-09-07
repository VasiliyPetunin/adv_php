<?php

/**
 * Created by PhpStorm.
 * User: apryakhin
 * Date: 29.09.2016
 * Time: 13:13
 */
class Basket extends Model
{
    protected $id_user = NULL;
    protected $id_good;
    protected $price = 0;
    protected $is_in_order = 0;
    protected $id_order = NULL;

    function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    function setUser($id_user){
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $id_good
     */
    public function setIdGood($id_good)
    {
        $this->id_good = $id_good;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param int $is_in_order
     */
    public function setIsInOrder($is_in_order)
    {
        $this->is_in_order = $is_in_order;
    }

    /**
     * @param mixed $id_order
     */
    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;
    }

    public function save(){
        $query = "INSERT INTO basket(id_user, id_good, price, is_in_order) VALUES 
                  (
                    ".(($this->id_user)==NULL ? 'NULL' : $this->id_user).",
                    ".$this->id_good.",
                    ".$this->price.",
                    ".$this->is_in_order."
                  )";
        db::getInstance()->Query($query);
    }
}