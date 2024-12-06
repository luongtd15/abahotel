<?php
$db = new Database();  // Thêm dòng này
$pdo = $db->getConnect();  // Thêm dòng này
$act = isset($_GET['act']) ? $_GET['act'] : "";

$act = isset($_GET['act']) ? $_GET['act'] : "";

switch ($act) {
    case 'home': {
            $homeController = new HomeController;
            $homeController->showDashboard();
        }
    case 'register': {

            $userController = new UserController;
            $userController->createUser();
            break;
        }
    case 'login': {
            $userController = new UserController;
            $userController->formlogIn();
            break;
        }
    case 'feedback': {
            $feedbackController = new FeedbackController();
            $feedbackController->FeedbackSubmit();
            break;
        }
    case 'checklogin': {
            $userController = new UserController;
            $userController->postlogin();
            break;
        }

    case 'logout': {
            $userController = new UserController;
            $userController->logout();
            break;
        }
    case 'reservation': {
            $reservationController = new ReservationController;
            $reservationController->ReservationSubmit();

            break;
        }
    case 'pay': {
            $paymentController = new PaymentController();
            $paymentController->payment($_GET['id']);
            break;
        }

    case 'status-change': {
            $paymentController = new ReservationController();
            $paymentController->changeThisReservationStatus($_GET['id']);
            break;
        }

    case 'room': {
            $roomController = new RoomController();
            $roomController->showRoomList();
            break;
        }
    case 'room-client': {
            $roomController = new RoomController();
            $roomController->showRoomListClient();
            break;
        }

    case 'contact': {
            $roomController = new HomeController();
            $roomController->contact();
            break;
        }

    case 'search': {
            $searchController = new SearchController($pdo);
            $searchController->search();
            break;
        }
    case 'room-type': {
            $roomTypeController = new RoomTypeController();
            $roomTypeController->showRoomTypeList();
            break;
        }

    case 'room-type-create': {
            $roomTypeController = new RoomTypeController();
            $roomTypeController->createANewRoomType();
            break;
        }

    case 'room-type-detail': {
            $roomController = new RoomController();
            $roomController->showDetailOfThisRoom($_GET['id']);
            break;
        }

    case 'room-detail': {
            $roomController = new RoomController();
            $roomController->showRoom($_GET['id']);
            break;
        }

    case 'about': {
            $roomController = new HomeController();
            $roomController->about();
            break;
        }

    case 'history_order': {
            $roomController = new HomeController();
            $roomController->historyOrder();
            break;
        }
    case 'cancel': {
            $reservationController = new ReservationController();
            $reservationController->cancelReservation($_GET['id']);  // Gọi phương thức hủy đặt phòng
            break;
        }

    default: {
            $homeController = new HomeController;
            $homeController->showDashboard();
        }
}
