<?php
 session_start();
 require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $specialty = $_POST['specialty'];
    $available_times = $_POST['available_times'];
    $training_price = $_POST['training_price'];
    $bio = $_POST['bio'];

    // Handle file upload
    $profile_image = $_FILES['profile_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_image);
    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);

    // Insert data into the database
    $sql = "INSERT INTO trainers (username, email, name, age, specialty, available_times, training_price, bio, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssissdss", $username, $email, $name, $age, $specialty, $available_times, $training_price, $bio, $target_file);
    if ($stmt->execute()) {
        header("location: http://localhost/FIT-CONNECT/view/includes/profile/trainerProfile.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
