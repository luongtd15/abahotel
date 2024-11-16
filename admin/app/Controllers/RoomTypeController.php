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

    public function showRoomTypeList()
    {
        $room_types = $this->roomQuery->getRoomTypeList();
        $view = 'room_types/list';
        include 'app/Views/layouts/master.php';
    }

    public function createANewRoomType()
    {
        $view = 'room_types/create';
        $room_types = $this->roomQuery->getRoomTypeList();

        $roomType = new RoomType;

        // Initialize errors array for validation
        $errors = [];

        if (!empty($_POST)) {

            // Validate room name
            $roomType->name = trim($_POST['name']);
            if (empty($roomType->name)) {
                $errors[] = "Room name is required.";
            }

            // Validate status and description
            $roomType->description = trim($_POST['description']);

            $roomType->number_of_beds = trim($_POST['number_of_beds']);
            if (
                empty($roomType->number_of_beds)
                || $roomType->number_of_beds <= 0
            ) {
                $errors[] = "Number of beds is required, and > 0.";
            }

            $roomType->max_occupancy = trim($_POST['max_occupancy']);
            if (
                empty($roomType->max_occupancy)
                || $roomType->max_occupancy <= 0
            ) {
                $errors[] = "Max occupancy is required, and > 0.";
            }

            $roomType->price = trim($_POST['price']);
            if (
                empty($roomType->price)
                || $roomType->price <= 0
            ) {
                $errors[] = "Price is required, and > 0";
            }

            // Validate and upload image


            // If there are no errors, create room in database
            if (empty($errors)) {
                $newRoomType = $this->roomTypeQuery->createRoomType($roomType);
                $_SESSION['success'] = 'Successfully created a new room type.';
                header('location:' . BASE_URL_ADMIN . '?act=room-type');
                exit();
            } else {
                $_SESSION['errs'] = $errors;
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function updateThisRoomType($id)

    {
        if ($id !== "") {
            $view = 'room_types/update';
            $room_type = $this->roomTypeQuery->getRoomType($id);

            $roomType = new RoomType;

            // Initialize errors array for validation
            $errors = [];

            if (!empty($_POST)) {

                // Validate room name
                $roomType->name = trim($_POST['name']);
                if (empty($roomType->name)) {
                    $errors[] = "Room name is required.";
                }

                // Validate status and description
                $roomType->description = trim($_POST['description']);

                $roomType->number_of_beds = ($_POST['number_of_beds']);
                if (
                    empty($roomType->number_of_beds)
                    || $roomType->number_of_beds <= 0
                ) {
                    $errors[] = "Number of beds is required, and > 0.";
                }

                $roomType->max_occupancy = ($_POST['max_occupancy']);
                if (
                    empty($roomType->max_occupancy)
                    || $roomType->max_occupancy <= 0
                ) {
                    $errors[] = "Max occupancy is required, and > 0.";
                }

                $roomType->price = ($_POST['price']);
                if (
                    empty($roomType->price)
                    || $roomType->price <= 0
                ) {
                    $errors[] = "Price is required, and > 0";
                }

                // Validate and upload image


                // If there are no errors, create room in database
                if (empty($errors)) {
                    $newRoomType = $this->roomTypeQuery->updateRoomType($id,$roomType);
                    $_SESSION['success'] = 'Successfully updated this room type.';
                    header('location:' . BASE_URL_ADMIN . '?act=room-type-update&id=' . $room_type->id);
                    exit();
                } else {
                    $_SESSION['errs'] = $errors;
                }
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function deleteThisRoomType($id)
    {
        // Kiểm tra giá trị id trước khi xử lý logic
        if ($id !== "") {

            $this->roomTypeQuery->deleteRoomType($id);
            $_SESSION['success'] = 'Room type deleted successfully.';
            header('location:' . BASE_URL_ADMIN . '?act=room-type');

            // Code...
        } else {
            $_SESSION['error'] = 'Room not found.';
        }
    }
}
