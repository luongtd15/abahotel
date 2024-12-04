<?php


class FeedbackController {
    public $feedbackQuery;

    public function __construct()
    {
        $this->feedbackQuery = new Feedback();
    }
    public function FeedbackSubmit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user-client'])) {
                $_SESSION['error'] = 'Please login to submit a review';
                header('Location: ' . BASE_URL . '?act=login');
                exit;
            }

            $id_room = $_POST['id_room'] ?? '';
            $id_user = $_POST['id_user'] ?? '';
            $rating = $_POST['rating'] ?? '';
            $comment = $_POST['comment'] ?? '';

            try {
                $result = $this->feedbackQuery->addFeedback($id_user, $id_room, $rating, $comment);
                if ($result) {
                    $_SESSION['success'] = 'Thank you for your review!';
                    // Lưu feedback mới vào session để hiển thị ngay
                    $_SESSION['new_feedback'] = [
                        'username' => $_SESSION['user-client']->username,
                        'rating' => $rating,
                        'comment' => $comment,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                } else {
                    $_SESSION['error'] = 'Failed to submit review';
                }
            } catch (Exception $e) {
                $_SESSION['error'] = 'Error: ' . $e->getMessage();
            }
            
            // Redirect về trang detail với tab review active
            header('Location: ' . BASE_URL . '?act=room-detail&id=' . $id_room . '&tab=review#review');
            exit;
        }
    }

    public function getFeedbakList(){
        $id_room = $_GET['id'] ?? '';
        $feedbacks = $this->feedbackQuery->getallfeedback($id_room);
    }
    
    public function displayStars($rating) {
        if($rating == 1) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        } 
        else if($rating == 2) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        }
        else if($rating == 3) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        }
        else if($rating == 4) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-line" style="color: #f5885f;"></i>';
        }
        else if($rating == 5) {
            return '<i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>
                    <i class="ri-star-fill" style="color: #f5885f;"></i>';
        }
    }
}
?>