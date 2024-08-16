<?php
 session_start();
 require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email']; 
    $specialty = $_POST['specialty'];
    $bio = $_POST['bio'];
    $profile_image = '';

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        // Ensure the uploads directory exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $profile_image = $target_dir . basename($_FILES["profile_image"]["name"]);
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profile_image)) {
            $profile_image = $conn->real_escape_string($profile_image); // Escape the file path
        } else {
            echo "Error uploading file.";
            exit;
        }
    }


    $sql = "INSERT INTO dieticians (username, email, specialty, bio, profile_image) VALUES ('$username', '$email', '$specialty', '$bio', '$profile_image')";

    if ($conn->query($sql) === TRUE) {
        header("location: http://localhost/FIT-CONNECT/view/includes/profile/dieticianProfile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
