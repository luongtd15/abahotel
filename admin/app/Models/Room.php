<?php

class Room
{
    public $id;
    public $id_room_type;
    public $name;
    public $image;
    public $description;
    public $status;

    public $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getRoomList()
    {
        try {
            $sql =
                "
                SELECT 
                    r.id                        AS r_id,
                    r.id_room_type              AS r_id_room_type,
                    r.name                      AS r_name,
                    r.image                     AS r_image,
                    r.status                    AS r_status,
                    r.description               AS r_description,
                    t.name                      AS t_name,
                    t.price                     AS t_price,
                    t.number_of_beds            AS t_number_of_beds,
                    t.max_occupancy             AS t_max_occupancy
                FROM rooms AS r
                INNER JOIN room_types AS t ON t.id = r.id_room_type
                ORDER BY r_id DESC
            ";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getRoom($id)
    {
        try {
            $sql = "SELECT*FROM rooms WHERE id = $id";
            $stmt = $this->pdo->query($sql)->fetch();
            if ($stmt !== false) {
                $room = new Room();
                $room->id = $stmt->id;
                $room->id_room_type = $stmt->id_room_type;
                $room->name = $stmt->name;
                $room->image = $stmt->image;
                $room->description = $stmt->description;
                $room->status = $stmt->status;
                return $room;
            }
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getAllRoomForReservation()
    {
        try {
            $sql = "SELECT*FROM rooms";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getRoomByIDRoomType($id)
    {
        try {
            $sql = "SELECT*FROM rooms WHERE id_room_type = $id LIMIT 1";
            $stmt = $this->pdo->query($sql)->fetch();
            if ($stmt !== false) {
                $room = new Room();
                $room->id = $stmt->id;
                $room->id_room_type = $stmt->id_room_type;
                $room->name = $stmt->name;
                $room->image = $stmt->image;
                $room->description = $stmt->description;
                $room->status = $stmt->status;
                return $room;
            }
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getRoomTypeList()
    {
        try {
            $sql = "select * from room_types";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function create(Room $room)
    {
        try {
            $sql = "INSERT INTO rooms (id_room_type, name, image, description, status)
                VALUES (:id_room_type, :name, :image, :description, :status)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_room_type' => $room->id_room_type,
                ':name' => $room->name,
                ':image' => $room->image,
                ':description' => $room->description,
                ':status' => $room->status
            ]);

            return "New room created successfully";
        } catch (Exception $error) {
            echo "<h1>Lỗi hàm create trong model: " . $error->getMessage() . "</h1>";
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM rooms WHERE id = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "Delete room successfully";
            }
        } catch (Exception $error) {
            echo "<h1>";
            echo "Lỗi hàm delete trong model: " . $error->getMessage();
            echo "</h1>";
        }
    }

    public function update($id, Room $room)
    {
        try {
            $sql = "UPDATE rooms SET 
            id_room_type = :id_room_type, 
            name = :name, 
            image = :image, 
            description = :description, 
            status = :status
            WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_room_type' => $room->id_room_type,
                ':name' => $room->name,
                ':image' => $room->image,
                ':description' => $room->description,
                ':status' => $room->status
            ]);

            return "New room updated successfully";
        } catch (Exception $error) {
            echo "<h1>Lỗi hàm update trong model: " . $error->getMessage() . "</h1>";
        }
    }

    public function getFeedbackForRoom($id)
    {
        try {
            $sql = "select * from feedbacks WHERE id_room = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }
    public function getReservationForRoom($id)
    {
        try {
            $sql = "select * from reservations WHERE id_room = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }


}
