<?php

require_once 'commons/env.php';

// Database
include 'client/app/Database/Database.php';
// Model
include 'client/app/Models/HomeModel.php';
include 'client/app/Models/Room.php';
include 'client/app/Models/RoomType.php';
include 'client/app/Models/User.php';
include 'client/app/Models/SearchModel.php';
include 'client/app/Models/FeedbackModel.php';
include 'client/app/Models/ReservationModel.php';
include 'client/app/Models/PaymentModel.php';




// Controller
include 'client/app/Controllers/HomeController.php';
include 'client/app/Controllers/RoomController.php';
include 'client/app/Controllers/RoomTypeController.php';
include 'client/app/Controllers/UserController.php';
require_once 'client/app/Controllers/SearchController.php';
include 'client/app/Controllers/FeedbackController.php';
include 'client/app/Controllers/ReservationController.php';
include 'client/app/Controllers/PaymentController.php';





// route
require_once 'client/router/web.php';
