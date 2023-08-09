<?php

if(isset($_POST["submit"]))
{
    //Grabing the data
    $pwd=$_POST["pwd"];
    $email=$_POST["email"];

    //Instantiate Login controller class
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";
    $login = new LoginContr($pwd, $email);

    //Runnning error handelers and user login
    $login->loginUser();

    //Going to back to front page
    header("location: ../index.php?error=none");

}