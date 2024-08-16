
<?php
session_start();
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function validation_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validation_input($_POST['username']);
    $password = validation_input($_POST['password']);

    // Check if the user exists
    $sql = $conn->prepare("SELECT * FROM registeruser WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $role = $user['role'];
            
            switch ($role) {
                case 'User':
                    header("Location: http://localhost/FIT-CONNECT/view/page/userDashboard/userDashboard.php");
                    break;
                case 'Trainer':
                    header("Location: http://localhost/FIT-CONNECT/view/page/trainerDashboard/trainerDashbord.php");
                    break;
                case 'Dietician':
                    header("Location: http://localhost/FIT-CONNECT/view/page/dieticianDashboard/dieticianDashboard.php");
                    break;
                default:
                    echo "Invalid role.";
                    break;
            }
            exit();
        } else {
            $_SESSION['flash_message'] = "Username or password is incorrect.";
            header("Location: http://localhost/FIT-CONNECT/view/page/login/login.php"); // Redirect back to login page or show error
            exit();
        }
    } else {
        $_SESSION["error"] = "No user found with that username.";
        header("Location: http://localhost/FIT-CONNECT/view/page/login/login.php"); // Redirect back to login page or show error
        exit();
    }
}
?>