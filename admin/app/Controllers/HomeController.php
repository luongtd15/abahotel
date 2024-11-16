<?php
class HomeController
{
    public function showDashboard()
    {
        $view = 'home-page';
        $homeModel = new HomeModel();
        $availableRoom = $homeModel->getAvailableRoomForHome();
        $occupiedRoom = $homeModel->getOccupiedRoomForHome();
        include 'app/Views/layouts/master.php';
    }
}
