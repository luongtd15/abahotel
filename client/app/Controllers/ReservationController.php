<?php
class ReservationController
{
    private $reservationModel;

    public function __construct()
    {
        $this->reservationModel = new Reservation();
    }

    public function ReservationSubmit()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user-client'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để đặt phòng";
            header('Location: ' . BASE_URL . '?act=login');
            return;
        }

        // Lấy id user từ session
        $id_user = $_SESSION['user-client']->id;

        try {
            // Kiểm tra xem phòng có còn trống không
            if ($this->reservationModel->isRoomAvailable($_POST['room_id'])) {
                // Gọi hàm addReservation với id_user từ session
                $result = $this->reservationModel->addReservation(
                    $id_user,                    // lấy từ session
                    $_POST['room_id'],           // id phòng được chọn
                    'Confirmed',                 // trạng thái đặt phòng
                    $_POST['occupancy'],         // số người
                    $_POST['payment_method'],
                    $_POST['total_price'],       // tổng tiền
                    $_POST['checkin_date'],      // ngày check-in
                    $_POST['checkout_date']      // ngày check-out
                );

                if ($result) {
                    $_SESSION['booking_success'] = true; // Đặt phòng thành công
                    $_SESSION['success'] = "Đặt phòng thành công!";
                } else {
                    $_SESSION['error'] = "Có lỗi xảy ra khi đặt phòng!";
                }

                header('Location: ' . BASE_URL . '?act=history_order');
            } else {
                $_SESSION['error'] = "Room is Full"; // Thông báo nếu phòng đã đầy
                header('Location: ' . BASE_URL . '?act=room-detail&id=' . $_POST['room_id']);
                return;
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '?act=room-detail&id=' . $_POST['room_id']);
        }
    }

    public function cancelReservation($id)
    {
        try {
            $invoice = $this->reservationModel->getInvoiceForCart($id);
            $result = $this->reservationModel->cancelReservation($id);
            if ($result) {
                $_SESSION['success'] = "Hủy đặt phòng thành công!";
                header('Location: ' . BASE_URL . '?act=history_order');
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi hủy đặt phòng!";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
        // Chuyển hướng về trang lịch sử đặt phòng
    }

    public function changeThisReservationStatus($id)
    {
        try {
            // $invoice = $this->reservationModel->getInvoiceForCart($id);
            $result = $this->reservationModel->changeReservationStatus($id);
            if ($result) {
                $_SESSION['success'] = "Thanh toán thành công!";
                header('Location: ' . BASE_URL . '?act=history_order');
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi thanh toán!";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }
}
