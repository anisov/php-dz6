<?php

function getAllUsersAdmin($DBH)
{
    $users = $DBH->query('SELECT * FROM burger.users')->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getAllOrderAdmin($DBH)
{
    $orders = $DBH->query('SELECT * FROM burger.order')->fetchAll(PDO::FETCH_ASSOC);
    return $orders;
}
