<?php
session_start();

require_once '../commons/env.php';

// Database
include 'app/Database/Database.php';
// Model
include 'app/Models/HomeModel.php';
include 'app/Models/Room.php';
include 'app/Models/RoomType.php';
include 'app/Models/User.php';

// Controller
include 'app/Controllers/HomeController.php';
include 'app/Controllers/RoomController.php';
include 'app/Controllers/RoomTypeController.php';
include 'app/Controllers/UserController.php';

// route
require_once 'router/web.php';