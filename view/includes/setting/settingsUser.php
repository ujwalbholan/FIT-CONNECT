
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="settings.css" />
  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <div class="brand">
          <h2>FIT CONNECT</h2>
        </div>
        <nav>
          <ul>
            <li><a href="../../includes/profile/Userprofile.php">Profile</a>
          </li>
            <li>
              <a
                href="http://localhost/FIT-CONNECT/view/page/userDashboard/userDashboard.php"
                >Dashboard</a
              >
            </li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/task/taskUser.php">Tasks</a></li>
            <li>
              <a href="http://localhost/FIT-CONNECT/view/includes/setting/settingsUser.php" class="active"
                >Settings</a
              >
            </li>
          </ul>
        </nav>
      </div>
      <div class="main-content">
        <header>
          <!-- <div class="user-info">
            <span>George Kerman</span>
            <a href="/frontend/profile.html"
              ><img src="profile.jpg" alt="Profile"
            /></a>
          </div> -->
        </header>
        <div class="settings">
          <h2>Settings</h2>
          <div class="help-section">
            <h3>Help</h3>
            <p>
              If you need any assistance, please contact our support team at
              support@example.com.
            </p>
          </div>
          <div class="logout-section">
            <button id="logout-btn">Logout</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      document
        .getElementById("logout-btn")
        .addEventListener("click", function () {
          window.location.href =
            "http://localhost/FIT-CONNECT/controller/logout.php";
        });
    </script>
  </body>
</html>
