
<?php
require_once('../config.php');
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function validation_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validation_input($_POST['username']);
    $email = validation_input($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = validation_input($_POST['role']);

    // Check if the username or email already exists
    $stmt = $conn->prepare("SELECT * FROM registeruser WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Username or email already exists.";
        header("Location: register.php"); // Redirect back to the registration page or show error
        exit();
    } else {
        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO registeruser (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $role);

        if ($stmt->execute()) {
            // Store the username and role in session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect based on role
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
            echo "Error: " . $stmt->error;
        }
    }
}
?>
