<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIT-CONNECT</title>
    <link rel="icon" href="../../public/assets/logo/logo.jpg" />
    <link rel="stylesheet" href="contact.css" />
    <link rel="stylesheet" href="../../../public/globle.css" />


</head>
<body>
      <?php
       require_once("../../includes/nav.php");
      ?>   
    <section class="contact-us">
      <div class="container">
         <h1>Contact Us</h1>
         <p>
           If you have any questions, feedback, or need support, please feel free
           to reach out to us. We’re here to help you on your fitness journey!
         </p>

         <form action="#" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
          </div>
          <button type="submit">Send Message</button>
         </form>
      </div>
    </section>
    <?php
      require_once("../../includes/footer.php");
    ?>
</body>
</html>