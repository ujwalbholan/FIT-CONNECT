<?php
require_once('../config.php');

// Start session
session_start();

// Function to validate input
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieving POST data and validating it
    $full_name = validateInput($_POST['full-name']);
    $age = validateInput($_POST['age']);
    $gender = validateInput($_POST['gender']);
    $fitness_goal = validateInput($_POST['fitness-goal']);
    $fitness_level = validateInput($_POST['fitness-level']);
    $hire_dietitians = validateInput($_POST['hire_dietitians']);
    $training_place = validateInput($_POST['training_place']);
    $diet = validateInput($_POST['diet']);
    $medical_conditions = isset($_POST['medical-conditions']) ? validateInput($_POST['medical-conditions']) : '';
    $allergies = isset($_POST['allergies']) ? validateInput($_POST['allergies']) : '';
    $workout_days = validateInput($_POST['workout-days']);
    $workout_time = isset($_POST['workout-times']) ? validateInput($_POST['workout-times']) : '';
    $trainer_gender = isset($_POST['trainer-gender']) ? validateInput($_POST['trainer-gender']) : '';
    $trainer_age = isset($_POST['trainer-age']) ? validateInput($_POST['trainer-age']) : '';
    $trainer_training_style = isset($_POST['trainer-training-style']) ? validateInput($_POST['trainer-training-style']) : '';
    $goals_timeline = validateInput($_POST['goals-timeline']);

    // Insert user info
    $sql = "INSERT INTO users (full_name, age, gender, hire_dietitians) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("siss", $full_name, $age, $gender, $hire_dietitians);
        $stmt->execute();
        $user_id = $stmt->insert_id; // Get the last inserted user_id
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }

    // Insert fitness info
    $sql = "INSERT INTO fitness_info (user_id, fitness_goal, fitness_level, training_place, diet) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("issss", $user_id, $fitness_goal, $fitness_level, $training_place, $diet);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }

    // Insert user preferences
    $sql = "INSERT INTO user_preferences (user_id, workout_days, workout_time, goals_timeline) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isss", $user_id, $workout_days, $workout_time, $goals_timeline);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }
}

// Fetch the data for matchmaking
$user_id = $conn->insert_id; // Assuming the last inserted user ID is the one we need
$fitness_goal = '';
$workout_time = '';
$hire_dietitians = '';
$diet = '';

echo($user_id);

// Fetch fitness info
$sql = "SELECT fitness_goal, diet FROM fitness_info WHERE user_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($fitness_goal, $diet);
    $stmt->fetch();
    $stmt->close();
}

// Fetch workout times
$sql = "SELECT workout_time FROM user_preferences WHERE user_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($workout_time);
    $stmt->fetch();
    $stmt->close();
}

// Fetch hire_dietitians
$sql = "SELECT hire_dietitians FROM users WHERE user_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hire_dietitians);
    $stmt->fetch();
    $stmt->close();
}

$matched_trainers = [];
$matched_dieticians = [];

// Fetch trainers that match the user's preferences
$sql_trainers = "SELECT * FROM trainers WHERE specialty LIKE ? OR available_times LIKE ?";
if ($stmt = $conn->prepare($sql_trainers)) {
    $like_fitness_goal = "%$fitness_goal%";
    $like_workout_time = "%$workout_time%";
    $stmt->bind_param("ss", $like_fitness_goal, $like_workout_time);
    $stmt->execute();
    $result_trainers = $stmt->get_result();

    while ($trainer = $result_trainers->fetch_assoc()) {
        $matched_trainers[] = $trainer;
    }
    $stmt->close();
} else {
    die("Error preparing statement: " . $conn->error);
}

// Fetch dieticians if the user wants to hire one
if ($hire_dietitians == 'YES') {
    $sql_dieticians = "SELECT * FROM dieticians WHERE specialty LIKE ?";
    if ($stmt = $conn->prepare($sql_dieticians)) {
        $like_diet = "%$diet%";
        $stmt->bind_param("s", $like_diet);
        $stmt->execute();
        $result_dieticians = $stmt->get_result();

        while ($dietician = $result_dieticians->fetch_assoc()) {
            $matched_dieticians[] = $dietician;
        }
        $stmt->close();
    } else {
        die("Error preparing statement: " . $conn->error);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>

    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
 }

h1 {
    text-align: center;
    margin-top: 20px;
}

.matched-trainers, .matched-dieticians {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

.trainer-card, .dietician-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin: 10px;
    padding: 20px;
    width: 250px;
    text-align: center;
}

.trainer-card img, .dietician-card img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-bottom: 10px;
}

.trainer-card h2, .dietician-card h2 {
    font-size: 20px;
    margin: 10px 0;
}

.trainer-card p, .dietician-card p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

    </style>
</head>
<body>
    <h1>Matched Trainers</h1>
    <div class="matched-trainers">
        <?php foreach ($matched_trainers as $trainer): ?>
            <div class="trainer-card">
                <img src="<?php echo $trainer['profile_image']; ?>" alt="Trainer Image">
                <h2><?php echo $trainer['name']; ?></h2>
                <p>Specialty: <?php echo $trainer['specialty']; ?></p>
                <p>Available Times: <?php echo $trainer['available_times']; ?></p>
                <p>Training Price: $<?php echo $trainer['training_price']; ?></p>
                <p>Bio: <?php echo $trainer['bio']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($hire_dietitians == 'yes'): ?>
        <div class="matched-dieticians">
            <?php foreach ($matched_dieticians as $dietician): ?>
                <div class="dietician-card">
                    <img src="<?php echo $dietician['profile_image']; ?>" alt="Dietician Image">
                    <h2><?php echo $dietician['name']; ?></h2>
                    <p>Specialty: <?php echo $dietician['specialty']; ?></p>
                    <p>Bio: <?php echo $dietician['bio']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
