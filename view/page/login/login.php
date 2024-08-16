<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - fit connect</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="img">
        <img src="../../../public/assets/img/download.jpeg" alt="morning yoga image">
    </div>
    <div class="login">
        <div class="login-cntainer">
         <div id="toast" class="toast"></div>
          <h1>Login</h1>
          <?php require_once('../../includes/message.php')?>
          <form action="http://localhost/FIT-CONNECT/controller/loginValidation.php" method="post">
               <div>
                   <label for="username">Username</label>
                   <input type="text" id="username" name="username" placeholder="Enter your Username" required>
                </div>
                <div>
                   <label for="password">Password</label>
                   <input type="password" id="password" name="password" placeholder="Enter your Password" required>
               </div>
               <button type="submit">Login</button> <br>
               <p>If you want make account <a href="../sign-up/signup.php">sign up</a></p>
          </form>
        </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
            const flashMessage = <?php echo json_encode($_SESSION['flash_message'] ?? null); ?>;
            if (flashMessage) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('popup-message', flashMessage.type);
                messageDiv.innerText = flashMessage.message;

                document.body.appendChild(messageDiv);
                messageDiv.style.display = 'block';

                setTimeout(() => {
                    messageDiv.style.display = 'none';
                    document.body.removeChild(messageDiv);
                }, 5000);
            }

            <?php unset($_SESSION['flash_message']); ?>
        });
    </script>
   
</body>
</html>