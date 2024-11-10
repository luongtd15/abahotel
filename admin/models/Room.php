<?php
if (!function_exists('getRoomList')) {
    function getRoomList()
    {
        try {
            $sql =
                "
                SELECT 
                    r.id_room                   AS r_id_room,
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
                INNER JOIN room_types AS t ON t.id_room_type = r.id_room_type
                ORDER BY r_id_room DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}

if (!function_exists('getRoomDetail')) {
    function getRoomDetail($id)
    {
        try {
            $sql =
            "
                SELECT 
                    r.id_room                   AS r_id_room,
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
                INNER JOIN room_types AS t ON t.id_room_type = r.id_room_type
                WHERE r.id_room = :id LIMIT 1
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $err) {
            debug($err);
        }
    }
}
