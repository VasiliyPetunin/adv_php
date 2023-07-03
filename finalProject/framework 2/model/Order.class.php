<?php

class Order extends Model {
    protected static $table = 'orders';

    protected static function setProperties()
    {
        self::$properties['phone'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['address'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['email'] = [
            'type' => 'float'
        ];
    }

    function success() {
        return "Your order is being processed. Expect a call from the manager within 10 minutes.";
    }

    function failure() {
        return "Couldn't place an order. Try again later.";
    }
}