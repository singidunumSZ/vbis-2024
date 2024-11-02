<?php

namespace app\core;

class View
{
    public function render($viewName, $layoutName){
        $layout = $this->renderLayout($layoutName);
        $view = $this->renderPartialView($viewName);


        echo str_replace("{{ RENDER_SECTION }}", $view, $layout);


        ob_start();
        include_once  __DIR__ . "/../views/$viewName.php";
        return ob_get_clean();
    }
    public function renderLayout($layoutName){
        ob_start();
        include_once  __DIR__ . "/../views/layout/$layoutName.php";
        return ob_get_clean();
    }
    public function renderPartialView($viewName){
        ob_start();
        include_once  __DIR__ . "/../views/$viewName.php";
        return ob_get_clean();
    }
}