<?php
function index()
{
    $sitekey = '6Ler6VAUAAAAAMYHq1ulHZlGulznLJDT-hcG0sRr';
    $view = new \App\Core\View();
    $view->twigLoad('template', [
        'sitekey' => $sitekey,
        'url' => 'order/add'
    ]);
}
index();