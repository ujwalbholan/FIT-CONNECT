<?php
session_start();
if (!isset($_SESSION['username'])) {
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Section</title>
    <link rel="stylesheet" href="profile.css" />
  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <div class="brand">
          <h2>FIT CONNECT</h2>
        </div>
        <nav>
        <ul>
            <li><a href="../../includes/profile/dieticianProfile.php" class="active">Profile</a></li>
            <li>
              <a
                href="http://localhost/FIT-CONNECT/view/page/dieticianDashboard/dieticianDashboard.php"
                >Dashboard</a
              >
            </li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/task/taskDietitian.php">Tasks</a></li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/setting/settigsDietitian.php">Settings</a></li>
          </ul>
        </nav>
      </div>
      <div class="main-content">
        <header>
          <div class="user-info">
            <h1><?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <!-- <img src="profile.jpg" alt="Profile" id="profile-pic" /> -->
          </div>
        </header>
        <div class="profile-section">
          <h2>Personal Information:</h2>
          <form id="profileForm" action="http://localhost/FIT-CONNECT/controller/dieticianProfileData.php"
           method="POST"
           enctype="multipart/form-data"
           >

            <input type="hidden" id="trainer_id" value="1"> <!-- Assuming trainer ID is 1 -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>


            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="specialty">Specialty:</label>
            <input type="text" id="specialty" name="specialty">

            <label for="available_times">Available Times:</label>
            <input type="text" id="available_times" name="available_times">

            <label for="training_price">Training Price:</label>
            <input type="number" step="0.01" id="training_price" name="training_price">

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"></textarea>

            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image">

            <button type="submit">Save Profile</button>

            <?php  header("location: http://localhost/FIT-CONNECT/view/page/dieticianDashboard/dieticianDashboard.php")  ?>
        </form>
        </div>
      </div>
    </div>
    <script src="/frontend/profile.js"></script>
  </body>
</html>
