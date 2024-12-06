<?php

class ReservationController
{
    public $reservationQuery;
    public $roomQuery;
    public $roomTypeQuery;
    public $userQuery;

    public function __construct()
    {
        $this->reservationQuery = new Reservation();
        $this->roomQuery = new Room();
        $this->roomTypeQuery = new RoomType();
        $this->userQuery = new User();
    }

    public function showInvoiceList()
    {
        $invoices = $this->reservationQuery->getInvoice();
        $view = 'reservations/list';
        include 'app/Views/layouts/master.php';
    }

    public function updateThisReservation($id)
    {
        if ($id !== "") {
            $view = 'reservations/update';
            $reservation = new Reservation();
            $reservation = $this->reservationQuery->getInvoiceById($id);
            $rooms = $this->roomQuery->getAllRoomForReservation();
            $roomTypes = $this->roomQuery->getRoomTypeList();
            $users = $this->userQuery->getUserList();

            // Initialize errors array for validation
            $errors = [];

            if (!empty($_POST)) {

                // Validate status and description
                $reservation->id_user = trim($_POST['id_user']);


                // Validate room type
                $reservation->id_room = trim($_POST['id_room']);


                // Validate status and description
                $reservation->reservation_status = trim($_POST['reservation_status']);


                $reservation->occupancy = trim($_POST['occupancy']);


                $reservation->checkin_date = trim($_POST['checkin_date']);


                $reservation->checkout_date = trim($_POST['checkout_date']);


                // Validate and upload image


                // If there are no errors, create room in database
                if (empty($errors)) {
                    $new = $this->reservationQuery->updateInvoice($id, $reservation);
                    if ($reservation->reservation_status === CHECKOUT || $reservation->reservation_status === CANCEL) {
                        $this->roomQuery->changeRoomStatusToAvailable($reservation->id_room);
                    } else {
                        $this->roomQuery->changeRoomStatusToOccupied($reservation->id_room);
                    }
                    $_SESSION['success'] = 'Successfully updated this reservation.';
                    header('location:' . BASE_URL_ADMIN . '?act=invoice-update&id=' . $reservation->id);
                    exit();
                } else {
                    $_SESSION['errs'] = $errors;
                }
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function showThisInvoiceDetail($id)
    {
        $invoice = $this->reservationQuery->getInvoiceDetail($id);
        // // var_dump($invoice);
        $reservation = new Reservation();
        $reservation = $this->reservationQuery->getInvoiceById($id);

        $errors = [];

        if (!empty($_POST)) {
            // Validate status and description
            $reservation->reservation_status = trim($_POST['reservation_status']);
            // If there are no errors, create room in database
            if (empty($errors)) {
                $new = $this->reservationQuery->updateInvoice($id, $reservation);
                if ($reservation->reservation_status === CHECKOUT || $reservation->reservation_status === CANCEL) {
                    $this->roomQuery->changeRoomStatusToAvailable($reservation->id_room);
                } else {
                    $this->roomQuery->changeRoomStatusToOccupied($reservation->id_room);
                }
                $_SESSION['success'] = 'Successfully updated this reservation.';
                header('location:' . BASE_URL_ADMIN . '?act=invoice-detail&id=' . $reservation->id);
                exit();
            } else {
                $_SESSION['errs'] = $errors;
            }
        };

        $view = 'reservations/detail';
        include 'app/Views/layouts/master.php';
    }
}
