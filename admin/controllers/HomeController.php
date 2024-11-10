<?php
if (!function_exists('homePage')) {
    function homePage(){
        $view = 'home';
        
        require_once PATH_VIEW_ADMIN . 'layouts/master.php';
    }
}