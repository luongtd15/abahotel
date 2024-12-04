<?php
class HomeController
{
    public function showDashboard()
    {
        $view = 'home-page';
        $homeModel = new HomeModel();
        $availableRoom = $homeModel->getAvailableRoomForHome();
        $occupiedRoom = $homeModel->getOccupiedRoomForHome();

        $reservation = new Reservation();
        $recentReservations = $reservation->getInvoiceForHome();
        // var_dump($recentReservations);

        $customers = $homeModel->countCustomer();

        $room_types = $homeModel->countRoomType();

        $availableRooms = $homeModel->countAvailableRoom();

        $occupiedRooms = $homeModel->countOccupiedRoom();

        $feedbacks = $homeModel->countFeedback();

        $invoices = $homeModel->countInvoice();

        var_dump($customers);

        // var_dump($recentReservations);
        include 'app/Views/layouts/master.php';
    }
}
