<?php
class Feedback {
    public $id;
    public $id_user;
    public $id_room;
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
public function addfeedback($id_user, $id_room, $rating, $comment) {
    try {
        $sql = "INSERT INTO feedbacks (id_user, id_room, rating, comment) 
                VALUES (:id_user, :id_room, :rating, :comment)";
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindValue(':id_room', $id_room, PDO::PARAM_INT);
        $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        // Log error
        error_log($e->getMessage());
        throw $e;
    }
}
public function getallfeedback($id_room) {
    $sql = "SELECT f.*, u.name as user_name 
            FROM feedbacks f
            LEFT JOIN users u ON f.id_user = u.id 
            WHERE f.id_room = :id_room 
            ORDER BY f.id DESC";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id_room', $id_room, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>