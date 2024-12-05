<?php
class UserController
{
    public $userQuery;

    public function __construct()
    {
        $this->userQuery = new User();
    }

    public function showUserList()
    {
        $view = 'users/list';
        $users = $this->userQuery->getUserList();
        include 'app/Views/layouts/master.php';
    }

    public function createANewUser()
    {
        $view = 'users/create';

        $user = new User;

        // Initialize errors array for validation
        $errors = [];

        if (!empty($_POST)) {
            // var_dump($_POST); // Kiểm tra dữ liệu POST nhận được
            // die();

            // Validate room name
            $user->name = trim($_POST['name']);
            if (empty($user->name)) {
                $errors[] = "User name is required.";
            }

            // Validate room type
            $user->age = trim($_POST['age']);
            if (empty($user->age) || $user->age < 18) {
                $errors[] = "User age is required, age >= 18.";
            }

            // Validate status and description
            $user->address = trim($_POST['address']);
            if (empty($user->address)) {
                $errors[] = "User address is required.";
            }

            $user->phone = trim($_POST['phone']);
            if (empty($user->phone) || strlen($user->phone) != 10) {
                $errors[] = "User phone is required, length = 10.";
            }

            $user->password = trim($_POST['password']);
            if (empty($user->password) || strlen($user->password) < 8) {
                $errors[] = "User password is required, length > 8.";
            }

            $user->email = trim($_POST['email']);
            if (empty($user->email)) {
                $errors[] = "User email is required.";
            } elseif (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            } elseif ($this->userQuery->checkEmailExists($user->email)) {
                $errors[] = "Email already exists.";
            }

            $user->role = trim($_POST['role']);

            // Validate and upload image


            // If there are no errors, create room in database
            if (empty($errors)) {
                $newUser = $this->userQuery->createUser($user);
                $_SESSION['success'] = 'Successfully created a new user.';
                header('location:' . BASE_URL_ADMIN . '?act=user');
                exit();
            } else {
                $_SESSION['errs'] = $errors;
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function updateThisUser($id)
    {
        if ($id !== "") {
            $view = 'users/update';
            $user = new User;
            $user = $this->userQuery->getUser($id);

            // Initialize errors array for validation
            $errors = [];

            if (!empty($_POST)) {

                // Validate status and description
                $user->name = trim($_POST['name']);
                if (empty($user->name)) {
                    $errors[] = "User name is required.";
                }

                // Validate room type
                $user->age = trim($_POST['age']);
                if (empty($user->age) || $user->age < 18) {
                    $errors[] = "User age is required, age >= 18.";
                }

                // Validate status and description
                $user->address = trim($_POST['address']);
                if (empty($user->address)) {
                    $errors[] = "User address is required.";
                }

                $user->phone = trim($_POST['phone']);
                if (empty($user->phone) || strlen($user->phone) != 10) {
                    $errors[] = "User phone is required, length = 10.";
                }

                $user->password = trim($_POST['password']);
                if (empty($user->password) || strlen($user->password) < 8) {
                    $errors[] = "User password is required, length > 8.";
                }

                // $user->email = trim($_POST['email']);
                // if (empty($user->email)) {
                //     $errors[] = "User email is required.";
                // } elseif (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                //     $errors[] = "Invalid email format.";
                // } elseif ($this->userQuery->checkEmailExists($user->email)) {
                //     $errors[] = "Email already exists.";
                // }

                $newEmail = trim($_POST['email']);
                if ($newEmail !== $user->email) {
                    if (empty($newEmail)) {
                        $errors[] = "User email is required.";
                    } elseif (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Invalid email format.";
                    } elseif ($this->userQuery->checkEmailExists($newEmail)) {
                        $errors[] = "Email already exists.";
                    } else {
                        $user->email = $newEmail; // Chỉ cập nhật nếu email mới hợp lệ và không trùng
                    }
                }

                $user->role = trim($_POST['role']);

                // Validate and upload image


                // If there are no errors, create room in database
                if (empty($errors)) {
                    $newUser = $this->userQuery->updateUser($id, $user);
                    $_SESSION['success'] = 'Successfully updated this user.';
                    header('location:' . BASE_URL_ADMIN . '?act=user-update&id=' . $user->id);
                    exit();
                } else {
                    $_SESSION['errs'] = $errors;
                }
            }
        }

        include 'app/Views/layouts/master.php';
    }

    public function deleteThisUser($id)
    {
        // Kiểm tra giá trị id trước khi xử lý logic
        if ($id !== "") {
            $user = $this->userQuery->getUser($id);
            $feedbacks = $this->userQuery->getReservationForUser($id);
            $reservations = $this->userQuery->getFeedbackForUser($id);

            if (empty($feedbacks) && empty($reservations)) {
                $this->userQuery->deleteUser($id);
                $_SESSION['success'] = 'User deleted successfully.';
            } else {
                $_SESSION['errs'] = "This user is currently in use and cannot be deleted.";
            }

            header('location:' . BASE_URL_ADMIN . '?act=user');

            // Code...
        } else {
            $_SESSION['error'] = 'User not found.';
        }
    }

    public function showUserDetail($id)
    {
        $user = $this->userQuery->getUser($id);
        $view = 'users/detail';
        include 'app/Views/layouts/master.php';
    }

    public function showSignin()
    {
        if (!empty($_POST)) {

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $admin = $this->userQuery->getAdmin($email, $password);

            if (!$admin) {
                $_SESSION['err'] = 'Email or password is not correct';

                header('location:' . BASE_URL_ADMIN . '?act=admin-signin');
                exit();
            }

            $_SESSION['admin'] = $admin;

            header('location:' . BASE_URL_ADMIN);
            exit();
        }
        include 'app/Views/users/signin.php';
    }

    function adminSignout()
    {
        if (!empty($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header('location:' . BASE_URL_ADMIN);
        exit();
    }
}
