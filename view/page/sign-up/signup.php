<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="signup.css" />
</head>
<body>
    <div class="img">
        <img src="../../../public/assets/img/download.jpeg" alt="morning yoga image">
    </div>
    
   <div class="container"> 
        <div class="form-container">
            <h2>Sign Up</h2>
            <form action="http://localhost/FIT-CONNECT/controller/signupValidation.php" method="POST">
                <div class="form-group">
                    <label for="signup-username">Username</label>
                    <input type="text" id="signup-username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="signup-email">Email</label>
                    <input type="email" id="signup-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="signup-password">Password</label>
                    <input type="password" id="signup-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="signup-role">Sign Up As</label>
                    <select id="signup-role" name="role" required>
                        <option value="User">User</option>
                        <option value="Trainer">Trainer</option>
                        <option value="Dietician">Dietician</option>
                    </select>
                </div>
                <button class="button" type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>