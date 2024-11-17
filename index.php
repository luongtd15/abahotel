<?php

require_once 'commons/env.php';

// Database
include 'client/app/Database/Database.php';
// Model
include 'client/app/Models/HomeModel.php';
include 'client/app/Models/Room.php';
include 'client/app/Models/RoomType.php';
include 'client/app/Models/User.php';

// Controller
include 'client/app/Controllers/HomeController.php';
include 'client/app/Controllers/RoomController.php';
include 'client/app/Controllers/RoomTypeController.php';
include 'client/app/Controllers/UserController.php';
// route
require_once 'client/router/web.php';
