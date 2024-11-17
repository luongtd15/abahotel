<?php
session_start();
class UserController
{
    public $userQuery;

    public function __construct()
    {
        $this->userQuery = new User();
    }

    public function createUser()
    {
        // var_dump("Function called");
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        //         var_dump($thongBaoLoi);
        // var_dump($thongBaoThanhCong);

        if (isset($_POST['register']) && $_POST['register']) {
            // var_dump($_POST);
            $user = new User();
            $user->name = trim($_POST["name"]);
            $user->age = trim($_POST["age"]);
            $user->email = trim($_POST["email"]);
            $user->address = trim($_POST["address"]);
            $user->phone = trim($_POST["phone"]);
            $user->password = trim($_POST["password"]);

            if (
                !empty($user->name) && !empty($user->age) && !empty($user->email) &&
                !empty($user->address) && !empty($user->phone) &&
                !empty($user->password) && filter_var($user->email, FILTER_VALIDATE_EMAIL)
            ) {
                // var_dump(!empty($user->name), !empty($user->age), !empty($user->email), 
                // !empty($user->address), !empty($user->phone), 
                // !empty($user->password), filter_var($user->email, FILTER_VALIDATE_EMAIL));

                if ($this->userQuery->insert_user($user)) {
                    $thongBaoThanhCong = "Register Success";
                } else {
                    $thongBaoLoi = "Có lỗi xảy ra khi lưu dữ liệu. Vui lòng thử lại.";
                }
            } else {
                $thongBaoLoi = "Vui lòng điền đầy đủ thông tin và email hợp lệ.";
            }
        }

        $view = 'users/register';
        include 'client/app/Views/layouts/master.php';
    }


    private function deleteSessionError()
    {
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    }

    public function formlogIn()
    {


        $view = 'users/login';
        include 'client/app/Views/layouts/master.php';
        $this->deleteSessionError();
        // Xóa lỗi session sau khi hiển thị
        exit();
    }

    public function postlogin()
    {
        // Kiểm tra nếu dữ liệu đã được gửi qua POST

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra nếu form đăng nhập được submit
            if (isset($_POST['login']) && $_POST['login']) {
                echo "bắt đầu xử lí form đăng nhập";

                $email = $_POST['email'];
                $password = $_POST['password'];
                // var_dump($email);
                // var_dump($password);
                // die;



                // Kiểm tra nếu các trường email và mật khẩu không trống
                if (empty($email) || empty($password)) {
                    $_SESSION['error'] = "Vui lòng nhập đầy đủ email và mật khẩu.";
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL . '?act=login');
                    exit();
                }
                
                
                ///////

                // Kiểm tra đăng nhập qua phương thức checklogin
                $user = $this->userQuery->checklogin($email, $password);
                // var_dump($user);
                // die();
                

                // Nếu đăng nhập thành công, lưu thông tin vào session và chuyển hướng về trang chủ
                if ($user) {
                    $_SESSION['user-client'] = $user;
                    header("Location: " . BASE_URL);
                    exit();
                } else {
                    // Nếu đăng nhập thất bại, lưu thông báo lỗi vào session và chuyển hướng lại trang đăng nhập

                    $_SESSION['error'] = "Sai email hoặc mật khẩu.";
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL . '?act=login');
                    exit();
                }
            }
        }
    }
}
