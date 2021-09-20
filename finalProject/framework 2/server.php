<?php

$userId = $_POST['id'];
$totalCost = $_POST['totalCost'];
$productsIdArray = $_POST['productsId'];
$productsId = implode('', $productsIdArray);

$res = db::getInstance()->Query('INSERT INTO `orders` (id_user, amount, id_items) VALUES (:id_user, :amount, :id_items)', ['id_user' => $userId, 'amount' => $totalCost, 'id_items' => $productsId]);

if ($res) {
    header("Location: index.php?path=Order/success");
} else {
    header("Location: index.php?path=Order/failure");
}