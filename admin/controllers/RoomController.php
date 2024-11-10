<?php
function roomList()
{
    $title = "Room List";
    $view = 'rooms/index';
    $script = 'datatable';
    $script2 = 'rooms/script';
    $style = 'datatable';

    $rooms = getRoomList();
    // debug($rooms);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function roomDetail($id)
{
    $room = getRoomDetail($id);

    if (empty($room)) {
        e404();
    }

    $view = 'rooms/detail';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function roomCreate()
{
    $view = 'rooms/create';

    $room_types = getList('room_types');

    if (!empty($_POST)) {

        $data = [
            "id_room_type" => $_POST['id_room_type'] ?? null,
            "name" => $_POST['name'] ?? null,
            "status" => $_POST['status'] ?? STATUS_OCCUPIED,
            "image" => get_file_upload('image'),
            "description" => $_POST['description'] ?? null
        ];

        validateCreateRoom($data);

        $image = $data['image'];

        if (is_array($image)) {
            $data['image'] = uploadFile($image, 'uploads/rooms/');
        }

        insert('rooms', $data);

        $_SESSION['success'] = 'Successfully';

        header('location:' . BASE_URL_ADMIN . '?act=rooms');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCreateRoom($data)
{
    $errs = [];

    if (empty($data['name'])) {
        $errs[] = 'room name cannot be empty';
    } elseif (strlen($data['name']) > 30) {
        $errs[] = 'room name must be no more than 30 characters';
    }

    if (empty($data['price'])) {
        $errs[] = 'room price cannot be empty';
    } elseif ($data['price'] < 0) {
        $errs[] = 'room price must > 0';
    }

    if (empty($data['image'])) {

        $errs[] = "The room's thumbnail cannot be empty";
    } elseif (is_array($data['image'])) {

        $imgType = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['image']['size'] > 2 * 1024 * 1024) {
            $errs[] = "The room's thumbnail cannot be larger than 2 MB";
        } elseif (!in_array($data['image']['type'], $imgType)) {
            $errs[] = "the room's thumbnail can only be in PNG, JPG, or JPEG format";
        }
    }

    if (!empty($errs)) {
        $_SESSION['errs'] = $errs;
        $_SESSION['data'] = $data;

        header('location:' . BASE_URL_ADMIN . '?act=room-create');
        exit();
    }
}

function roomUpdate($id)
{

    $room = getRoomDetail($id);
    // debug($room);

    if (empty($room)) {
        e404();
    }

    $view = 'rooms/update';

    $room_types = getList('room_types');

    if (!empty($_POST)) {

        $data = [
            "category_id" => $_POST['category_id'] ?? $room['p_category_id'],
            "author_id" => $_POST['author_id'] ?? $room['p_author_id'],
            "name" => $_POST['name'] ?? $room['p_name'],
            "price" => $_POST['price'] ?? $room['p_price'],
            "status" => $_POST['status'] ?? $room['p_status'],
            "is_trending" => $_POST['is_trending'] ?? $room['p_is_trending'],
            "image" => get_file_upload('image', $room['p_image']),
            "description" => $_POST['description'] ?? $room['p_description'],
            "updated_at" => date('Y-m-d H:i:s')
        ];

        validateUpdateRoom($id, $data);

        $image = $data['image'];


        if (is_array($image)) {
            $data['image'] = uploadFile($image, 'uploads/rooms/');
        }

        update('rooms', $id, $data);

        if (
            !empty($image)
            && !empty($data['image'])
            && !empty($room['p_image'])
            && file_exists(PATH_UPLOAD . $room['p_image'])
        ) {
            unlink(PATH_UPLOAD . $room['p_image']);
        }

        $_SESSION['success'] = 'Successfully';


        header('location:' . BASE_URL_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUpdateRoom($id, $data)
{
    $errs = [];

    if (empty($data['name'])) {
        $errs[] = 'Product name cannot be empty';
    } elseif (strlen($data['name']) > 50) {
        $errs[] = 'Product name must be no more than 50 characters';
    }

    if (empty($data['price'])) {
        $errs[] = 'Product price cannot be empty';
    } elseif ($data['price'] < 0) {
        $errs[] = 'Product price must > 0';
    }

    if (empty($data['image'])) {

        $errs[] = "The product's thumbnail cannot be empty";
    } elseif (is_array($data['image'])) {

        $imgType = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['image']['size'] > 2 * 1024 * 1024) {
            $errs[] = "The product's thumbnail cannot be larger than 2 MB";
        } elseif (!in_array($data['image']['type'], $imgType)) {
            $errs[] = "the product's thumbnail can only be in PNG, JPG, or JPEG format";
        }
    }

    if (!empty($errs)) {
        $_SESSION['errs'] = $errs;
        $_SESSION['data'] = $data;

        header('location:' . BASE_URL_ADMIN . '?act=product-update');
        exit();
    }
}


function roomDelete($id)
{

    $room = detail('rooms', $id);

    if (empty($product)) {
        e404();
    }

    try {
        $GLOBALS['conn']->beginTransaction();

        deleteSt('rooms', $id);

        $GLOBALS['conn']->commit();
    } catch (\Exception $err) {
        $GLOBALS['conn']->rollBack();

        debug($err);
    }

    if (
        !empty($room['image'])
        && file_exists(PATH_UPLOAD . $room['image'])
    ) {
        unlink(PATH_UPLOAD . $room['image']);
    }

    $_SESSION['success'] = 'Successfully';

    header('location:' . BASE_URL_ADMIN . '?act=rooms');
    exit();
}