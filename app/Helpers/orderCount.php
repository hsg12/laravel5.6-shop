<?php

function orderCount($order, $productId) {
    $ordersArray = json_decode($order->products, true);
    return $ordersArray[$productId];
} 
