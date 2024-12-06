<?php
class Reservation
{
    public $id;
    public $id_user;
    public $id_room;
    public $reservation_status;
    public $occupancy;
    public $payment_method;
    public $total_price;
    public $checkin_date;
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
    public function addReservation($id_user, $id_room, $reservation_status, $occupancy, $payment_method, $total_price, $checkin_date, $checkout_date)
    {
        try {
            // Bắt đầu giao dịch
            $this->pdo->beginTransaction();

            // Thêm đặt phòng
            $sql = "INSERT INTO reservations (id_user, id_room, reservation_status, occupancy, payment_method, total_price, checkin_date, checkout_date)
                    VALUES (:id_user, :id_room, :reservation_status, :occupancy, :payment_method, :total_price, :checkin_date, :checkout_date)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id_user' => $id_user,
                ':id_room' => $id_room,
                ':reservation_status' => 'Confirmed', // Trạng thái đặt phòng
                ':occupancy' => $occupancy,
                ':payment_method' => $payment_method,
                ':total_price' => $total_price,
                ':checkin_date' => $checkin_date,
                ':checkout_date' => $checkout_date
            ]);

            // Cập nhật trạng thái phòng
            $sqlUpdateRoom = "UPDATE rooms SET status = 'occupied' WHERE id = :id_room";
            $stmtUpdateRoom = $this->pdo->prepare($sqlUpdateRoom);
            $stmtUpdateRoom->execute([':id_room' => $id_room]);

            // Cam kết giao dịch
            $this->pdo->commit();

            return true;
        } catch (\PDOException $e) {
            // Nếu có lỗi, hoàn tác giao dịch
            $this->pdo->rollBack();
            throw new \Exception("Lỗi khi thêm đặt phòng: " . $e->getMessage());
        }
    }
    public function getPaymentMethod()
    {
        try {
            $sql = "SELECT * FROM reservations";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Lỗi khi lấy phương thức thanh toán: " . $e->getMessage());
        }
    }

    public function getInvoiceForCart($id){
        try {
            $sql = "SELECT * FROM reservations WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Lỗi khi lấy phương thức thanh toán: " . $e->getMessage());
        }
    }
    public function isRoomAvailable($id_room)
    {
        try {
            // Kiểm tra trạng thái phòng
            $sql = "SELECT status FROM rooms WHERE id = :id_room";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id_room' => $id_room]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Trả về true nếu phòng còn trống
            return $result['status'] === 'available';
        } catch (\PDOException $e) {
            throw new \Exception("Lỗi khi kiểm tra tình trạng phòng: " . $e->getMessage());
        }
    }
    public function cancelReservation($reservation_id)
    {
        try {
            // Bắt đầu giao dịch
            $this->pdo->beginTransaction();

            // Lấy id_room từ bảng reservations trước khi xóa
            $sqlGetRoomId = "SELECT id_room FROM reservations WHERE id = :reservation_id";
            $stmtGetRoomId = $this->pdo->prepare($sqlGetRoomId);
            $stmtGetRoomId->execute([':reservation_id' => $reservation_id]);
            $room = $stmtGetRoomId->fetch();

            if (!$room) {
                throw new \Exception("Không tìm thấy đặt phòng với ID: $reservation_id");
            }

            $id_room = $room->id_room;

            // Xóa đặt phòng
            $sqlDeleteReservation = "DELETE FROM reservations WHERE id = :reservation_id";
            $stmtDeleteReservation = $this->pdo->prepare($sqlDeleteReservation);
            $stmtDeleteReservation->execute([':reservation_id' => $reservation_id]);

            // Cập nhật trạng thái phòng
            $sqlUpdateRoom = "UPDATE rooms SET status = 'available' WHERE id = :id_room";
            $stmtUpdateRoom = $this->pdo->prepare($sqlUpdateRoom);
            $stmtUpdateRoom->execute([':id_room' => $id_room]);

            // Cam kết giao dịch
            $this->pdo->commit();

            return true;
        } catch (\PDOException $e) {
            // Nếu có lỗi, hoàn tác giao dịch
            $this->pdo->rollBack();
            throw new \Exception("Lỗi khi hủy đặt phòng: " . $e->getMessage());
        }
    }
}
