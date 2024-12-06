<?php
class HomeController
{
    public function showDashboard()
    {
        $view = 'home-page';
        $homeModel = new HomeModel();

        $roomType = $homeModel->getRoomTypeForHome();
        $rooms = $homeModel->getRoomListForClient();
        // var_dump($rooms);
        include 'client/app/Views/layouts/master.php';
    }

    public function about()
    {
        $homeModel = new HomeModel();

        $roomType = $homeModel->getRoomTypeForHome();
        $view = 'about';
        include 'client/app/Views/layouts/master.php';
    }

    public function historyOrder()
    {
        $homeModel = new HomeModel();

        $roomType = $homeModel->getRoomTypeForHome();
        if (empty($_SESSION['user-client']->id)) {
            $view = 'home-page';
            include 'client/app/Views/layouts/master.php';
        }

        $orderHistory = $homeModel->getHistoryOrder();
        $view = 'cart';
        include 'client/app/Views/layouts/master.php';
    }

    public function contact()
    {
        $homeModel = new HomeModel();

        $roomType = $homeModel->getRoomTypeForHome();
        $view = 'contact';
        include 'client/app/Views/layouts/master.php';
    }
}
