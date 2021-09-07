<?php

Class Catalog extends Model
{
    protected static $table = 'catalog';

    public static function getGoods()
    {
        return db::getInstance()->Select(
            'SELECT name, price FROM `goods` WHERE status=:status',
            ['status' => Status::Active]);
    }
}