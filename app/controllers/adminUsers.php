<?php
$DBH = getConnect();
$users = getAllUsersAdmin($DBH);

function index($users)
{
    $view = new \App\Core\View();
    $view->twigLoad('admin-users', [
        'users' => $users,
    ]);
}

index($users);