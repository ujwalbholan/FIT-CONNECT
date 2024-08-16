<?php
require_once('../config.php'); 

// Get user input from POST request
// $full_name = $_POST['full-name'];
// $age = $_POST['age'];
// $gender = $_POST['gender'];
// $fitness_goal = $_POST['fitness-goal'];
// $fitness_level = $_POST['fitness-level'];
// $hire_dietitians = $_POST['hire_dietitians'];
// $training_place = $_POST['training_place'];
// $diet = $_POST['diet'];
// $medical_conditions = $_POST['medical-conditions'];
// $allergies = $_POST['allergies'];
// $workout_days = $_POST['workout-days'];
// $workout_times = $_POST['workout-times'];
// $trainer_gender = $_POST['trainer-gender'];
// $trainer_age = $_POST['trainer-age'];
// $trainer_training_style = $_POST['trainer-training-style'];
// $goals_timeline = $_POST['goals-timeline'];

// Match trainers
$sql = "SELECT * FROM trainers WHERE specialty LIKE ? AND available_times LIKE ? AND training_price <= ? AND gender LIKE ? AND age LIKE ? AND training_style LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", "%$fitness_goal%", "%$training_place%", 1000, "%$trainer_gender%", "%$trainer_age%", "%$trainer_training_style%");
$stmt->execute();
$trainers_result = $stmt->get_result();
$trainers = $trainers_result->fetch_all(MYSQLI_ASSOC);

// Match dieticians
$sql = "SELECT * FROM dieticians WHERE specialty LIKE ? AND bio LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", "%$diet%", "%$diet%");
$stmt->execute();
$dieticians_result = $stmt->get_result();
$dieticians = $dieticians_result->fetch_all(MYSQLI_ASSOC);

$sql_trainers = "SELECT * FROM trainers";
$result_trainers = $conn->query($sql_trainers);

// Fetch dieticians
$sql_dieticians = "SELECT * FROM dieticians";
$result_dieticians = $conn->query($sql_dieticians);

$conn->close();

// Display results
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matching Results</title>
    <style>
        .result-container { margin: 20px; }
        .profile { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        .profile img { max-width: 100px; height: auto; }
        .profile h3 { margin: 0; }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Matching Trainers</h2>
        <?php if (empty($trainers)): ?>
            <p>No trainers found based on your preferences.</p>
        <?php else: ?>
            <?php foreach ($trainers as $trainer): ?>
                <div class="profile">
                    <h3><?php echo htmlspecialchars($trainer['name']); ?></h3>
                    <p>Specialty: <?php echo htmlspecialchars($trainer['specialty']); ?></p>
                    <p>Available Times: <?php echo htmlspecialchars($trainer['available_times']); ?></p>
                    <p>Training Price: $<?php echo htmlspecialchars($trainer['training_price']); ?></p>
                    <p>Bio: <?php echo htmlspecialchars($trainer['bio']); ?></p>
                    <?php if ($trainer['profile_image']): ?>
                        <img src="<?php echo htmlspecialchars($trainer['profile_image']); ?>" alt="Profile Image">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <h2>Matching Dieticians</h2>
        <?php if (empty($dieticians)): ?>
            <p>No dieticians found based on your preferences.</p>
        <?php else: ?>
            <?php foreach ($dieticians as $dietician): ?>
                <div class="profile">
                    <h3><?php echo htmlspecialchars($dietician['username']); ?></h3>
                    <p>Specialty: <?php echo htmlspecialchars($dietician['specialty']); ?></p>
                    <p>Bio: <?php echo htmlspecialchars($dietician['bio']); ?></p>
                    <?php if ($dietician['profile_image']): ?>
                        <img src="<?php echo htmlspecialchars($dietician['profile_image']); ?>" alt="Profile Image">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
