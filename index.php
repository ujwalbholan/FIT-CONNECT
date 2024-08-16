<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css" />
  <link rel="stylesheet" href="public/globle.css" />
  <link rel="icon" href="public/assets/logo/logo.jpg" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <title>FIT-CONNECT</title>
</head>

<body>
  <?php
    require_once("view/includes/nav.php");
  ?>
  <main>
    <section class="section">
      <div class="viedo-content">
        <video class="video" muted autoplay loop height="970" width="1440">
          <source class="video1" src="public/assets/viedo/3209241-uhd_3840_2160_25fps.mp4" alt="video" />
        </video>
      </div>
      <div class="content">
        <h1>It's Your Workout: Your Time. Your Body. Own It.</h1>
      </div>
    </section>

    <section class="section-1">
      <div class="features">
        <div class="left-features">
          <h1>CRUSH YOUR FITNESS GOALS</h1>
          <p>
            With a personalized, daily schedule of workouts and meals designed
            to your fitness level.
          </p>
          <span>MEMBERSHIP FEATURES:</span>
          <div class="left-content">
            <h3>Easy-to-follow workout programs</h3>
            <p>Select from fit & toned, strength and weight loss options.</p>
          </div>
          <div class="left-content">
            <h3>Train with the world’s best coaches</h3>
            <p>
              They’ll motivate you and build confidence every step of the way.
            </p>
          </div>
          <div class="left-content">
            <h3>Never Get Bored</h3>
            <p>
              With fun workouts ranging from cardio and strength to HIIT and
              Pilates.
            </p>
          </div>
          <div class="left-content">
            <h3>Work out anytime, anywhere</h3>
            <p>
              With self-guided workouts for the gym and trainer-led workouts
              for home.
            </p>
          </div>
        </div>
        <div class="right-features">
          <img src="/fit-connect/public/assets/img/utility-iphone-device.png" alt="img" />
        </div>
      </div>
    </section>
  </main>

  <?php
      require_once("view/includes/footer.php");
   ?>

  <!-- <script src="/frontend/script.js"></script> -->
</body>

</html>