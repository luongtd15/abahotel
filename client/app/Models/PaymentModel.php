<?php
class PaymentModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function confirmReservation($id)
    {
        $sql = "UPDATE reservations SET reservation_status = 'Confirmed' WHERE id_room = :id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
