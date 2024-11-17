<?php
class HomeController{
    public function showDashboard(){
        $view= 'home-page';
        $homeModel = new HomeModel();

        include 'client/app/Views/layouts/master.php';
    }
}