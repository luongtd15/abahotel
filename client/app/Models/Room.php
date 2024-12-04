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



    public function getRoom($id)
    {
        try {
            $sql = "SELECT*FROM rooms WHERE id_room_type = $id";
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getRoomThis($id)
    {
        try {
            $sql = "SELECT * FROM rooms WHERE id = $id";
            return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getDetailRoom($id)
    {
        try {
            // SQL truy vấn lấy thông tin phòng kết hợp với loại phòng
            $sql = "SELECT rooms.*, room_type.name 
                FROM rooms
                INNER JOIN room_type ON rooms.id_room_type = room_type.id_room_type
                WHERE rooms.id = :id";

            // Chuẩn bị câu lệnh SQL
            $stmt = $this->pdo->prepare($sql);

            // Thực thi câu lệnh với tham số :id
            $stmt->execute([':id' => $id]);

            // Lấy dữ liệu và trả về kết quả
            $room = $stmt->fetch(PDO::FETCH_ASSOC); // sử dụng PDO::FETCH_ASSOC để chỉ lấy mảng kết quả mà không có key số

            // Nếu không tìm thấy phòng với id này
            if ($room === false) {
                return null; // Hoặc có thể trả về false tùy theo cách xử lý
            }

            return $room;  // Trả về thông tin phòng
        } catch (Exception $e) {
            // Bắt lỗi và trả về thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
            // Bạn có thể ghi lại lỗi trong log nếu cần
            return null; // Trả về null khi có lỗi
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

    // public function create(Room $room)
    // {
    //     try {
    //         $sql = "INSERT INTO rooms (id_room_type, name, image, description, status)
    //             VALUES (:id_room_type, :name, :image, :description, :status)";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute([
    //             ':id_room_type' => $room->id_room_type,
    //             ':name' => $room->name,
    //             ':image' => $room->image,
    //             ':description' => $room->description,
    //             ':status' => $room->status
    //         ]);

    //         return "New room created successfully";
    //     } catch (Exception $error) {
    //         echo "<h1>Lỗi hàm create trong model: " . $error->getMessage() . "</h1>";
    //     }
    // }

    // public function delete($id)
    // {
    //     try {
    //         $sql = "DELETE FROM rooms WHERE id = $id";
    //         $data = $this->pdo->exec($sql);
    //         if ($data === 1) {
    //             return "Delete room successfully";
    //         }
    //     } catch (Exception $error) {
    //         echo "<h1>";
    //         echo "Lỗi hàm delete trong model: " . $error->getMessage();
    //         echo "</h1>";
    //     }
    // }

    // public function update($id, Room $room)
    // {
    //     try {
    //         $sql = "UPDATE rooms SET 
    //         id_room_type = :id_room_type, 
    //         name = :name, 
    //         image = :image, 
    //         description = :description, 
    //         status = :status
    //         WHERE id = $id";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute([
    //             ':id_room_type' => $room->id_room_type,
    //             ':name' => $room->name,
    //             ':image' => $room->image,
    //             ':description' => $room->description,
    //             ':status' => $room->status
    //         ]);

    //         return "New room updated successfully";
    //     } catch (Exception $error) {
    //         echo "<h1>Lỗi hàm update trong model: " . $error->getMessage() . "</h1>";
    //     }
    // }
    public function getAllRoom()
    {
        $sql = "SELECT * FROM rooms ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomTypeById($id)
    {
        try {
            $sql = "SELECT rt.*, rt.price 
                    FROM room_types rt 
                    WHERE rt.id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
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

}
