<?php
class SearchModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function searchRooms($query, $typeId) {
        try {
            $sql = "SELECT r.*, rt.name as type_name, rt.price 
                    FROM rooms r 
                    LEFT JOIN room_types rt ON r.id_room_type = rt.id 
                    WHERE 1=1";
            $params = [];

            // Tìm kiếm theo tên
            if (!empty($query)) {
                $sql .= " AND r.name LIKE ?";
                $params[] = "%$query%";
            }

            // Tìm kiếm theo loại phòng
            if (!empty($typeId) && $typeId !== 'all') {
                $sql .= " AND r.id_room_type = ?";
                $params[] = $typeId;
            }

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Search error: " . $e->getMessage());
            return [];
        }
    }
}
?>
