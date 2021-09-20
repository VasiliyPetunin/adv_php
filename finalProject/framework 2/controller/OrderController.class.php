<?php

class OrderController extends Controller
{
    public $view = 'order';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | ДЕМО!!!';
    }

    function success() {
        return Order::success();
    }

    function failure() {
        return Order::failure();
    }
}