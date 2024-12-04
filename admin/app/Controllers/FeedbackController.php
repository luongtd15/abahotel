<?php

class FeedbackController
{
    public $feedbackQuery;
    public $reservationQuery;
    public $roomQuery;
    public $roomTypeQuery;
    public $userQuery;

    public function __construct()
    {
        $this->feedbackQuery = new Feedback();
        $this->reservationQuery = new Reservation();
        $this->roomQuery = new Room();
        $this->roomTypeQuery = new RoomType();
        $this->userQuery = new User();
    }

    public function showFeedbackList()
    {
        $view = 'feedbacks/list';
        $feedbacks = $this->feedbackQuery->getAllFeedbackForAdmin();
        include 'app/Views/layouts/master.php';
    }

    public function displayStarsForAdmin($rating)
    {
        if ($rating == 1) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        } else if ($rating == 2) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        } else if ($rating == 3) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        } else if ($rating == 4) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        } else if ($rating == 5) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>';
        }
    }

    public function deleteThisFeedback($id)
    {
        // Kiểm tra giá trị id trước khi xử lý logic
        if ($id !== "") {
            $feedback = $this->feedbackQuery->getFeedbackForAdmin($id);

            $this->feedbackQuery->deleteFeedback($id);
            $_SESSION['success'] = 'Feedback deleted successfully.';
            header('location:' . BASE_URL_ADMIN . '?act=feedback');

            // Code...
        } else {
            $_SESSION['error'] = 'Room not found.';
        }
    }

    public function showDetailOfThisFeedback($id)
    {
        if ($id !== "") {
            $feedback = $this->feedbackQuery->getFeedbackForAdmin($id);
            // var_dump($feedback);
            $view = 'feedbacks/detail';

            // Code...
        } else {
            $_SESSION['error'] = 'Feedback not found.';
        }
        include 'app/Views/layouts/master.php';
    }
}
