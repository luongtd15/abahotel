<?php
class Feedback
{
    public $id;
    public $id_room;
    public $id_user;
    public $rating;
    public $comment;
    public $created_at;

    public $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getAllFeedbackForAdmin()
    {
        try {
            $sql = "
                    SELECT feedbacks.*, users.name AS user_name, rooms.name AS room_name 
                    FROM feedbacks
                    LEFT JOIN users ON feedbacks.id_user = users.id
                    LEFT JOIN rooms ON feedbacks.id_room = rooms.id
                    ORDER BY feedbacks.rating DESC
                    ";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getFeedbackForAdmin($id)
    {
        try {
            $sql = "
            SELECT 
                feedbacks.*, 
                users.name AS user_name,
                room_types.name AS room_type_name,
                rooms.*
            FROM feedbacks
            LEFT JOIN users ON feedbacks.id_user = users.id
            LEFT JOIN rooms ON feedbacks.id_room = rooms.id
            INNER JOIN room_types ON room_types.id = rooms.id_room_type
            WHERE feedbacks.id = :id
            ORDER BY feedbacks.id
        ";
            $stmt = $this->pdo->prepare($sql);

            // Gắn tham số `id` vào truy vấn để tránh SQL Injection
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch(); // Lấy 1 bản ghi
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function deleteFeedback($id)
    {
        try {
            $sql = "DELETE FROM feedbacks WHERE id = $id";
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
}
