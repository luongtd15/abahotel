<?php
class HomeModel
{
    public $db;
    function __construct()
    {
        $this->db = new Database();
    }
    public function getAvailableRoomForHome()
    {
        try {
            $sql = "
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
                WHERE r.status = 'available'
                ORDER BY r_id DESC
            ";
            $result = $this->db->pdo->query($sql)->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getOccupiedRoomForHome()
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
                    WHERE r.status = 'occupied'
                    ORDER BY r_id DESC
                ";
            $result = $this->db->pdo->query($sql)->fetchAll();

            // Debugging: Hiển thị kết quả để kiểm tra
            var_dump($result);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getRoomTypeForHome()
    {

        try {
            $sql =
                "
                    SELECT 
                      *
                    FROM room_types
                    ORDER BY id DESC
                ";
            $result = $this->db->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getRoomForHome()
    {
        try {
            $sql =
                "
                    SELECT 
                      *
                    FROM rooms
                    ORDER BY id DESC
                ";
            $result = $this->db->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getRoomListForClient()
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

            $stmt = $this->db->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getHistoryOrder()
    {
        try {
            // Sử dụng query với JOIN giữa bảng `reservations` và `room`
            $sql = "
            SELECT 
                r.id AS reservation_id,
                r.id_room,
                r.reservation_status,
                r.occupancy,
                r.total_price,
                r.payment_method,
                r.checkin_date,
                r.checkout_date,
                r.created_at,
                rm.name AS room_name,
                rm.image AS room_image,
                rm.description AS room_description
            FROM reservations r
            JOIN rooms rm ON r.id_room = rm.id
            WHERE r.id_user = :id_user
            ORDER BY r.created_at DESC
        ";

            // Chuẩn bị câu lệnh và gán tham số an toàn
            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':id_user', $_SESSION['user-client']->id, PDO::PARAM_INT);
            $stmt->execute();

            // Trả về kết quả
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
