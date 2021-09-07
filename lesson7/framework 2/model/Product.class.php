<?php

Class Product extends Model
{
    protected static $table = 'product';

    public static function showItem($id)
    {
        return db::getInstance()->Select(
            'SELECT name, price FROM `goods` WHERE status=:status AND id = :id',
            ['status' => Status::Active, 'id' => $id]);
    }
}





