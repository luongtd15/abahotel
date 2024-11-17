<?php
class HomeModel
{
    public $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function middlewareAuthCheck($act)
    {
        if ($act == 'signin') {
            if (!empty($_SESSION['admin'])) {
                header('location:' . BASE_URL_ADMIN);
                exit();
            }
        } elseif (empty($_SESSION['admin'])) {
            header('location:' . BASE_URL_ADMIN . '?act=signin');
            exit();
        }
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
}
