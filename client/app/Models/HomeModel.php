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
    
}
