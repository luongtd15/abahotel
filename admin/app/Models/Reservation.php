<?php

class Reservation
{
    public $id;
    public $id_user;
    public $id_room;
    public $reservation_status;
    public $total_price;
    public $checkin_date;
    public $checkout_date;
    public $payment_method;
    public $created_at;

    public $occupancy;

    public $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getInvoice()
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
                    u.name                      AS u_name,
                    u.age                       AS u_age,
                    u.address                   AS u_address,
                    u.phone                     AS u_phone,
                    u.email                     AS u_email,
                    r.id_room_type              AS r_id_room_type,
                    r.name                      AS r_name,
                    r.image                     AS r_image,
                    t.name                      AS t_name
                FROM reservations AS i
                INNER JOIN rooms AS r ON r.id = i.id_room
                INNER JOIN users AS u ON u.id = i.id_user
                INNER JOIN room_types AS t ON t.id = r.id_room_type
                ORDER BY i_id DESC
            ";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getInvoiceById($id)
    {
        try {
            $sql = "SELECT * FROM reservations WHERE id = $id";
            $stmt = $this->pdo->query($sql)->fetch();
            if ($stmt !== false) {
                $reservation = new Reservation();
                $reservation->id = $stmt->id;
                $reservation->id_room = $stmt->id_room;
                $reservation->id_user = $stmt->id_user;
                $reservation->reservation_status = $stmt->reservation_status;
                $reservation->occupancy = $stmt->occupancy;
                $reservation->checkin_date = $stmt->checkin_date;
                $reservation->checkout_date = $stmt->checkout_date;
                $reservation->created_at = $stmt->created_at;
                return $reservation;
            }
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function updateInvoice($id, Reservation $reservation)
    {
        try {
            $sql = "UPDATE reservations SET 
            reservation_status = :reservation_status
            WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':reservation_status' => $reservation->reservation_status,
            ]);
            return true;
        } catch (Exception $error) {
            echo "<h1>User update err: " . $error->getMessage() . "</h1>";
        }
    }

    public function getInvoiceForHome()
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
                    u.name                      AS u_name,
                    u.age                       AS u_age,
                    u.address                   AS u_address,
                    u.phone                     AS u_phone,
                    u.email                     AS u_email,
                    r.id_room_type              AS r_id_room_type,
                    r.name                      AS r_name,
                    r.image                     AS r_image,
                    t.name                      AS t_name,
                    i.payment_method            AS i_payment_method,
                    i.total_price               AS i_total_price
                FROM reservations AS i
                INNER JOIN rooms AS r ON r.id = i.id_room
                INNER JOIN users AS u ON u.id = i.id_user
                INNER JOIN room_types AS t ON t.id = r.id_room_type
                ORDER BY i_id DESC
            ";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $err) {
            echo "Error: " . $err->getMessage() . "<hr>";
            return [];
        }
    }

    public function getInvoiceDetail($id)
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
                    t.number_of_beds            AS t_number_of_beds
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
}
