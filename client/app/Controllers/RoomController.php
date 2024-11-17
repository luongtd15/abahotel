<?php
class RoomController
{
    public $roomQuery;

    public function __construct()
    {
        $this->roomQuery = new Room();
    }

    public function showRoomList()
    {
        $rooms = $this->roomQuery->getRoomList();
        $view = 'rooms/list';
        include 'client/app/Views/layouts/master.php';
    }
    public function showRoomListClient()
    {
        $rooms = $this->roomQuery->getAllRoom();
        $view = 'rooms/list-client';
        include 'client/app/Views/layouts/master.php';
    }
    

    public function createANewRoom()
    {
        $view = 'rooms/create';

        $room = new Room;
        $room_types = $this->roomQuery->getRoomTypeList();

        // Initialize errors array for validation
        $errors = [];

        if (!empty($_POST)) {

            // Validate room name
            $room->name = trim($_POST['name']);
            if (empty($room->name)) {
                $errors[] = "Room name is required.";
            }

            // Validate room type
            $room->id_room_type = trim($_POST['id_room_type']);

            // Validate status and description
            $room->description = trim($_POST['description']);
            $room->status = trim($_POST['status']);

            // Validate and upload image
            if (isset($_FILES['fileUpload']['tmp_name']) && !empty($_FILES['fileUpload']['tmp_name'])) {
                $from = $_FILES['fileUpload']['tmp_name'];
                $filename = basename($_FILES['fileUpload']['name']);
                $to = PATH_UPLOAD . 'uploads/rooms/' . $filename;

                // Check if upload directory exists, if not, create it
                // if (!is_dir($targetDir)) {
                //     mkdir($targetDir, 0777, true);
                // }

                // Move uploaded file to target directory
                if (move_uploaded_file($from, $to)) {
                    $room->image = 'uploads/rooms/' . $filename; // Save relative path
                } else {
                    $errors[] = "Failed to upload image.";
                }
            } else {
                $errors[] = "Room image is required.";
            }

            // If there are no errors, create room in database
            if (empty($errors)) {
                $newRoom = $this->roomQuery->create($room);
                $_SESSION['success'] = 'Successfully created a new room.';
                header('location:' . BASE_URL_ADMIN . '?act=room');
                exit();
            } else {
                $_SESSION['errs'] = $errors;
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function deleteThisRoom($id)
    {
        // Kiểm tra giá trị id trước khi xử lý logic
        if ($id !== "") {
            $room = $this->roomQuery->getRoom($id);

            if (!empty($room->image) && file_exists(PATH_UPLOAD . $room->image)) {
                unlink(PATH_UPLOAD . $room->image);
            }

            $this->roomQuery->delete($id);
            $_SESSION['success'] = 'Room and associated image deleted successfully.';
            header('location:' . BASE_URL_ADMIN . '?act=room');

            // Code...
        } else {
            $_SESSION['error'] = 'Room not found.';
        }
    }

    public function updateThisRoom($id)
    {
        $view = 'rooms/update';

        if ($id !== "") {
            $room = new Room();
            $room = $this->roomQuery->getRoom($id);
            $room_types = $this->roomQuery->getRoomTypeList();

            // Initialize errors array for validation
            $errors = [];

            if (!empty($_POST)) {

                // Validate room name
                $room->name = trim($_POST['name']);
                if (empty($room->name)) {
                    $errors[] = "Room name is required.";
                }

                // Validate room type
                $room->id_room_type = trim($_POST['id_room_type']);

                // Validate status and description
                $room->description = trim($_POST['description']);
                $room->status = trim($_POST['status']);

                // Validate and upload image
                if (isset($_FILES['fileUpload']['tmp_name']) && !empty($_FILES['fileUpload']['tmp_name'])) {
                    $from = $_FILES['fileUpload']['tmp_name'];
                    $filename = basename($_FILES['fileUpload']['name']);
                    $to = PATH_UPLOAD . 'uploads/rooms/' . $filename;

                    // Check if upload directory exists, if not, create it
                    // if (!is_dir($targetDir)) {
                    //     mkdir($targetDir, 0777, true);
                    // }
                    if (!empty($room->image) && file_exists(PATH_UPLOAD . $room->image)) {
                        unlink(PATH_UPLOAD . $room->image);
                    }

                    // Move uploaded file to target directory
                    if (move_uploaded_file($from, $to)) {
                        $room->image = 'uploads/rooms/' . $filename; // Save relative path
                    } else {
                        $errors[] = "Failed to upload image.";
                    }
                } else {
                    // Nếu không có ảnh mới tải lên, giữ nguyên ảnh hiện tại
                    $room->image = $room->image;
                }

                // If there are no errors, create room in database
                if (empty($errors)) {
                    $newRoom = $this->roomQuery->update($id, $room);
                    $_SESSION['success'] = 'Successfully created a new room.';
                    header('location:' . BASE_URL_ADMIN . '?act=room');
                    exit();
                } else {
                    $_SESSION['errs'] = $errors;
                }
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function showDetailOfThisRoom($id)
    {
        $room = $this->roomQuery->getRoom($id);
        $room_types = $this->roomQuery->getRoomTypeList();
        $view = 'rooms/detail';
        include 'app/Views/layouts/master.php';
    } 
    public function showDetailOfThisRoomClient($id)
    {
        $room = $this->roomQuery->getRoom($id);
        $room_types = $this->roomQuery->getRoomTypeList();
        $view = 'rooms/detail-client';
        include 'app/Views/layouts/master.php';
    } 
    
   

 }
