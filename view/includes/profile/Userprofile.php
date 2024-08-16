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
            <li>
              <a href="../../includes/profile/Uaerprofile.php" class="active"
                >Profile</a
              >
            </li>
            <li>
              <a
                href="http://localhost/FIT-CONNECT/view/page/userDashboard/userDashboard.php"
                >Dashboard</a
              >
            </li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/task/taskUser.php">Tasks</a></li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/setting/settingsUser.php">Settings</a></li>
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
          <form
            action="http://localhost/FIT-CONNECT/controller/profilFormSubmit.php"
            method="POST"
            class="personal-info-form"
          >
            <div class="form-group">
              <label for="full-name">Full Name:</label>
              <input type="text" id="full-name" name="full-name" placeholder = "<?php echo htmlspecialchars($_SESSION['username']); ?>" />
            </div>

            <div class="form-group">
              <label for="age">Age:</label>
              <input type="number" id="age" name="age" required />
            </div>

            <div class="form-group">
              <label for="gender">Gender:</label>
              <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>

            <h2>Fitness Goals:</h2>
            <div class="form-group">
              <label for="fitness-goal"
                >What is your primary fitness goal?</label
              >
              <select id="fitness-goal" name="fitness-goal" required>
                <option value="gain-weight">Gain Weight</option>
                <option value="lose-weight">Lose Weight</option>
                <option value="build-muscle">Build Muscle</option>
                <option value="improve-cardio">Improve Cardio Fitness</option>
                <option value="get-shredded">Get Shredded</option>
                <option value="general-health">
                  General Health and Well-being
                </option>
              </select>
            </div>

            <h2>Fitness Experience:</h2>
            <div class="form-group">
              <label for="fitness-level"
                >How would you rate your current fitness level?</label
              >
              <select id="fitness-level" name="fitness-level" required>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
              </select>
            </div>

            <h2>Do you want to hire dietitians:</h2>
            <div class="form-group">
              <label for="hire_dietitians"
                >Do you want to hire a dietitian?</label
              >
              <select id="hire_dietitians" name="hire_dietitians" required>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>

            <h2>Training Place:</h2>
            <div class="form-group">
              <label for="training_place">Where do you prefer to train?</label>
              <select id="training_place" name="training_place" required>
                <option value="home">Home</option>
                <option value="gym">Gym</option>
              </select>
            </div>

            <h2>Dietary Preferences:</h2>
            <div class="form-group">
              <label for="diet">Do you follow any specific diet?</label>
              <select id="diet" name="diet" required>
                <option value="vegetarian">Vegetarian</option>
                <option value="vegan">Vegan</option>
                <option value="paleo">Paleo</option>
                <option value="keto">Keto</option>
                <option value="none">None</option>
                <option value="other">Other</option>
              </select>
            </div>

            <h2>Medical Considerations:</h2>
            <div class="form-group">
              <label for="medical-conditions"
                >Do you have any medical conditions or injuries?</label
              >
              <select
                id="medical-conditions"
                name="medical-conditions"
                required
              >
                <option value="diabetes">Diabetes</option>
                <option value="hypertension">Hypertension</option>
                <option value="heart-condition">Heart Condition</option>
                <option value="joint-issues">Joint Issues</option>
                <option value="none">None</option>
                <option value="other">Other</option>
              </select>
            </div>

            <h2>Allergies and Intolerances:</h2>
            <div class="form-group">
              <label for="allergies"
                >Do you have any allergies or intolerances?</label
              >
              <select id="allergies" name="allergies" required>
                <option value="lactose-intolerance">Lactose Intolerance</option>
                <option value="gluten-intolerance">Gluten Intolerance</option>
                <option value="nut-allergy">Nut Allergy</option>
                <option value="none">None</option>
                <option value="other">Other</option>
              </select>
            </div>

            <h2>Availability:</h2>
            <div class="form-group">
              <label for="workout-days"
                >How many days per week do you plan to work out?</label
              >
              <select id="workout-days" name="workout-days" required>
                <option value="1-2">1-2 days</option>
                <option value="3-4">3-4 days</option>
                <option value="5-6">5-6 days</option>
                <option value="every-day">Every day</option>
              </select>
            </div>

            <h2>Preferred Workout Times:</h2>
            <div class="form-group">
              <label for="workout-times"
                >What time of day do you prefer to work out?</label
              >
              <select id="workout-times" name="workout-times" required>
                <option value="early-morning">Early Morning</option>
                <option value="late-morning">Late Morning</option>
                <option value="afternoon">Afternoon</option>
                <option value="evening">Evening</option>
                <option value="late-evening">Late Evening</option>
              </select>
            </div>

            <h2>Preferred Trainer Characteristics:</h2>
            <div class="form-group">
              <label for="trainer-gender">Gender Preference:</label>
              <select id="trainer-gender" name="trainer-gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>

            <div class="form-group">
              <label for="trainer-age">Age Group Preference:</label>
              <select id="trainer-age" name="trainer-age" required>
                <option value="20-30">20-30</option>
                <option value="30-40">30-40</option>
                <option value="40+">40+</option>
              </select>
            </div>

            <div class="form-group">
              <label for="trainer-training-style"
                >Training Style Expertise:</label
              >
              <select
                id="trainer-training-style"
                name="trainer-training-style"
                required
              >
                <option value="strength">Strength Training</option>
                <option value="cardio">Cardio</option>
                <option value="yoga">Yoga/Pilates</option>
                <option value="flexibility">Flexibility/Mobility</option>
                <option value="mixed">Mixed/Varied Workouts</option>
              </select>
            </div>

            <h2>Goal Timeline:</h2>
            <div class="form-group">
              <label for="goals-timeline"
                >What is your timeline for achieving your fitness goals?</label
              >
              <select id="goals-timeline" name="goals-timeline" required>
                <option value="1-month">1 Month</option>
                <option value="3-months">3 Months</option>
                <option value="6-months">6 Months</option>
                <option value="1-year">1 Year</option>
                <option value="ongoing">Ongoing</option>
              </select>
            </div>

            <button class="button" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script src="/frontend/profile.js"></script>
  </body>
</html>
