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
                WHERE r.status = 'available'
                ORDER BY r_id DESC
            ";
        return $this->db->pdo->query($sql)->fetchAll();
    }

    public function getOccupiedRoomForHome()
    {
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
        return $this->db->pdo->query($sql)->fetchAll();
    }

    public function countCustomer()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM users";
            $stmt = $this->db->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
            return 0;
        }
    }

    public function countRoomType()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM room_types";
            $stmt = $this->db->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
            return 0;
        }
    }

    public function countAvailableRoom()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM rooms WHERE status = 'available'";
            $stmt = $this->db->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
            return 0;
        }
    }

    public function countOccupiedRoom()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM rooms WHERE status = 'occupied'";
            $stmt = $this->db->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
            return 0;
        }
    }
    public function countFeedback()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM feedbacks";
            $stmt = $this->db->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
            return 0;
        }
    }
    public function countInvoice()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM reservations";
            $stmt = $this->db->pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage();
            return 0;
        }
    }
}
