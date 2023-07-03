<?php

function getDATA($id) {
    $id25 = $id + 25; // Идентификатор записи в таблице, на которой остановится подгрузка
    return $db->query("SELECT * FROM `products` WHERE id>$id AND id<=$id25");
}