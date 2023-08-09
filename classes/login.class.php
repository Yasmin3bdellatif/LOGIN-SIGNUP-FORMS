<?php

class Login extends Dbh {

    protected function getUsers( $pwd, $email) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');
    
        if(!$stmt->execute(array( $Pwd, $email))) {
            $stmt=null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount()==0) 
        {
            $stmt=null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd==false) 
        {
            $stmt=null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif ($checkPwd==true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd;');
            if(!$stmt->execute(array( $Pwd, $email, $email))) {
                $stmt=null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
        }

        if($stmt->rowCount()==0) 
        {
            $stmt=null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetchALL(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["userid"]= $user[0]["users_id"];
        $_SESSION["userid"]= $user[0]["users_email"];

        $stmt=null;
    }

    
}