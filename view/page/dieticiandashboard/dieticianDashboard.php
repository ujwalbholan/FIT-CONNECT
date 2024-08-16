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
    <link rel="stylesheet" href="dieticianDashboard.css"/>

  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <div class="brand">
          <h2>FIT CONNECT</h2>
        </div>
        <nav>
        <li><a href="../../includes/profile/dieticianProfile.php" class="active">Profile</a></li>
            <li>
              <a href="http://localhost/FIT-CONNECT/view/page/dieticianDashboard/dieticianDashboard.php"
                >Dashboard</a
              >
            </li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/task/taskDietitian.php">Tasks</a></li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/setting/settingsDietitian.php">Settings</a></li>
          </ul>
        </nav>
      </div>
      <div class="main-content">
        <header>
          <div class="user-info">
            <h1>Hello 👋 <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <!-- <img src="profile.jpg" alt="Profile" /> -->
          </div>
        </header>
        <div class="content">
          <div class="stats">
            <div class="chart">
              <h3>Your Statistics</h3>
              <!-- Insert Chart Here -->
            </div>
            <div class="progress">
              <h3>Your Progress</h3>
              <!-- <div class="progress-circle">
                <span>75%</span>
              </div> -->
            </div>
          </div>
          <div class="details">
            <div class="tasks">
              <h3>Tasks for Today</h3>
              <!-- Insert Task Details Here -->
            </div>
            <div class="activities">
              <h3>New Activities</h3>
              <!-- Insert Activities Here -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
