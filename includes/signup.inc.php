<?php

if(isset($_POST["submit"]))
{
    //Grabing the data
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $uid=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdrepeat=$_POST["pwdrepeat"];
    $email=$_POST["email"];

    //Instantiate SignUp controller class
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-contr.class.php";
    $signup = new SignupContr($uid, $firstname, $lastname, $pwd, $pwdrepeat, $email);

    //Runnning error handelers and user signUp
    $signup->signupUser();

    //Going to back to front page
    header("location: ../index.php?error=none");

}