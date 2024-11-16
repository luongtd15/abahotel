<?php

$act = isset($_GET['act']) ? $_GET['act'] : "";

if ($act == 'admin-signin') {
    if (!empty($_SESSION['admin'])) {
        header('location:' . BASE_URL_ADMIN);
        exit();
    }
} elseif (empty($_SESSION['admin'])) {
    header('location:' . BASE_URL_ADMIN . '?act=admin-signin');
    exit();
}

switch ($act) {
    case 'home': {
            $homeController = new HomeController;
            $homeController->showDashboard();
        }

    case 'room': {
            $roomController = new RoomController();
            $roomController->showRoomList();
            break;
        }

    case 'room-create': {
            $roomController = new RoomController();
            $roomController->createANewRoom();
            break;
        }

    case 'room-update': {
            $roomController = new RoomController();
            $roomController->updateThisRoom($_GET['id']);
            break;
        }

    case 'room-delete': {
            $roomController = new RoomController();
            $roomController->deleteThisRoom($_GET['id']);
            break;
        }
    case 'room-detail': {
            $roomController = new RoomController();
            $roomController->showDetailOfThisRoom($_GET['id']);
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
    case 'room-type-update': {
            $roomTypeController = new RoomTypeController();
            $roomTypeController->updateThisRoomType($_GET['id']);
            break;
        }
    case 'room-type-delete': {
            $roomTypeController = new RoomTypeController();
            $roomTypeController->deleteThisRoomType($_GET['id']);
            break;
        }

    case 'user': {
            $userController = new UserController();
            $userController->showUserList();
            break;
        }

    case 'user-create': {
            $userController = new UserController();
            $userController->createANewUser();
            break;
        }

    case 'user-update': {
            $userController = new UserController();
            $userController->updateThisUser($_GET['id']);
            break;
        }

    case 'user-delete': {
            $userController = new UserController();
            $userController->deleteThisUser($_GET['id']);
            break;
        }

    case 'user-detail': {
            $userController = new UserController();
            $userController->showUserDetail($_GET['id']);
            break;
        }

    case 'admin-signin': {
            $userController = new UserController();
            $userController->showSignin();
            break;
        }

    case 'admin-signout': {
            $userController = new UserController();
            $userController->adminSignout();
            break;
        }

    default: {
            $homeController = new HomeController;
            $homeController->showDashboard();
        }
}
