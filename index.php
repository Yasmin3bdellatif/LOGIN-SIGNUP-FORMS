<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
  
    <section class="index-login"> 
        <div class="wrapper">
            <div class="index-login-signup">
                <div class="sign">
                    <h4>SIGN UP</h4>
                    <div class="text">
                        <p>Don`t have an account yet?  <a href="">Sign up here!</a> </p>
                    </div>
                    <form action="includes/signup.inc.php" method ="post" class="forms">
                        <input type="text" name="firstname" placeholder="First Name">
                        <input type="text" name="lastname" placeholder="Last Name">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                        <input type="text" name="email" placeholder="E-mail">
                        <br>
                        <button type="submit" name="submit">SIGN UP</button>
                    </form>
                </div>
            </div>

            <div class="index-login-login">
                <div class="styles">
                    <h4>SIGN IN</h4>
                    <div class="texts">
                        <p>Don`t have an account yet?  <a href="">Sign up here!</a> </p>
                    </div>
                    <form action="" method ="post" >
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <br>
                        <button type="submit" name="submit">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>