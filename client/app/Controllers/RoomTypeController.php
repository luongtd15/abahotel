<?php
class RoomTypeController
{
    public $roomTypeQuery;
    public $roomQuery;

    public function __construct()
    {
        $this->roomTypeQuery = new RoomType();
        $this->roomQuery = new Room();
    }
    
    public function showRoomTypeList(){
        $room_types = $this->roomQuery->getRoomTypeList();
        $view = 'room_types/list';
        include 'app/Views/layouts/master.php';

    }

    public function createANewRoomType()
    {
        $view = 'room_types/create';

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


}