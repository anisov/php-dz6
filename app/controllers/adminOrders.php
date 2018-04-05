<?php
$DBH = getConnect();
$orders = getAllOrderAdmin($DBH);

function index($orders)
{
    $view = new \App\Core\View();
    $view->twigLoad('admin-orders', [
        'orders' => $orders,
    ]);
}

index($orders);