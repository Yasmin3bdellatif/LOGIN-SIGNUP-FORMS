<?php

class Signup extends Dbh {

    protected function setUsers($uid, $pwd, $email, $firstname, $lastname) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email, firstname, lastname) VALUES (?, ?, ?, ?, ?)');
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email, $firstname, $lastname))) { // تم تصحيح هنا
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    }

    protected function checkUsers($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?');
        
        if(!$stmt->execute(array($uid, $email))) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
