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
                ':reservation_status' => 'pending', // Trạng thái đặt phòng
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

    public function getInvoiceForCart($id)
    {
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

    public function getInvoiceDetailForCart($id)
    {
        try {
            $sql =
                "
                SELECT 
                    i.id                        AS i_id,
                    i.id_room                   AS i_id_room,
                    i.id_user                   AS i_id_user,
                    i.reservation_status        AS i_reservation_status,
                    i.checkin_date              AS i_checkin_date,
                    i.checkout_date             AS i_checkout_date,
                    i.created_at                AS i_created_at,
                    i.occupancy                 AS i_occupancy,
                    i.total_price               AS i_total_price,
                    u.name                      AS u_name,
                    u.age                       AS u_age,
                    u.address                   AS u_address,
                    u.phone                     AS u_phone,
                    u.email                     AS u_email,
                    r.id_room_type              AS r_id_room_type,
                    r.name                      AS r_name,
                    r.image                     AS r_image,
                    t.name                      AS t_name,
                    t.number_of_beds            AS t_number_of_beds,
                    t.price                     AS t_price
                FROM reservations AS i
                INNER JOIN rooms AS r ON r.id = i.id_room
                INNER JOIN users AS u ON u.id = i.id_user
                INNER JOIN room_types AS t ON t.id = r.id_room_type
                WHERE i.id = $id ORDER BY i_id DESC
            ";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetch();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function changeReservationStatus($id)
    {
        try {
            // Bắt đầu giao dịch

            // Thêm đặt phòng
            $sql = "UPDATE reservations SET reservation_status = :status WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':status' => CONFIRM, // Trạng thái đặt phòng
            ]);
            return true;
        } catch (\PDOException $e) {
            // Nếu có lỗi, hoàn tác giao dịch
            throw new \Exception("Lỗi khi thêm đặt phòng: " . $e->getMessage());
        }
    }
}
