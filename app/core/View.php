<?php
namespace App\Core;
class View
{
    public function __construct($data = [])
    {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__.'/../template');
        $this->twig = new \Twig_Environment($this->loader);
    }

    public function twigLoad(String $filename, array $data)
    {
        echo $this->twig->render("$filename".".twig", $data);
        die();
    }
}
