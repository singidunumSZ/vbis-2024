<?php

namespace app\core;

class View
{
    public function render($viewName){
        ob_start();
        include_once  __DIR__ . "/../views/$viewName.php";
        return ob_get_clean();
    }
}