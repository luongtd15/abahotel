<?php

session_start();

// require cac file trong folder commons (ngoai tru disconnect-db.php)
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/crud-db.php';
// require_once './views/layouts/master.php';

// require file trong controllers va models
requireFile(PATH_CONTROLLER_ADMIN);
requireFile(PATH_MODEL_ADMIN);

$act = isset($_GET['act']) ? $_GET['act'] : '';

// middlewareAuthCheck($act);

match($act){
    '' => homePage(),

    'rooms' => roomList(),
    'room-create' => roomCreate(),
    'room-detail' => roomDetail($_GET['id']),
    'room-update' => roomUpdate($_GET['id']),
    'room-delete' => roomDelete($_GET['id'])
    
};



require_once '../commons/disconnect-db.php';