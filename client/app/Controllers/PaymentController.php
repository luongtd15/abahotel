<?php


class PaymentController {
    private $paymentQuerry;

    private $reservationQuery;

    public function __construct() {
        $this->paymentQuerry = new PaymentModel();
        $this->reservationQuery = new Reservation();
    }

    public function payment($id) {
        // Khởi tạo đối tượng Database
        $reservation = $this->reservationQuery->getInvoiceDetailForCart($id);
        // var_dump($reservation);
        // Hiển thị kết quả tìm kiếm
        include 'client/app/Views/users/payment.php';
    }
}
?>