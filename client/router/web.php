<?php

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
    case 'checklogin': {
            $userController = new UserController;
            $userController->postlogin();
            break;
        }
        // case 'room-detail-client':{
        //     //  $roomController = new RoomController();
        //     // $roomController->showDetailOfThisRoom($_GET['id']);
        //     //     break;
        // }
    case 'room-detail': {
            $roomController = new RoomController();
            $roomController->showDetailOfThisRoom($_GET['id']);
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
    case 'detail-client': {
            $roomController = new RoomController();
            $roomController->showDetailOfThisRoomClient($_GET['id']);
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

    default: {
            $homeController = new HomeController;
            $homeController->showDashboard();
        }
}
