<?php

class SignupContr extends Signup {

    private $uid;
    private $firstname;
    private $lastname;
    private $pwd;
    private $pwdrepeat;
    private $email;

    public function __construct($uid, $firstname, $lastname, $pwd, $pwdrepeat, $email) {
        $this->uid = $uid;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakencheck() == false) {
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
        }

        $this->setUsers($this->uid, $this->pwd, $this->email, $this->firstname, $this->lastname);
    }

    private function emptyInput() {
        return !empty($this->uid) && !empty($this->pwd) && !empty($this->pwdrepeat) && !empty($this->email) && !empty($this->firstname) && !empty($this->lastname);
    }

    private function invalidUid() {
        return preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    private function invalidEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function pwdMatch() {
        return $this->pwd === $this->pwdrepeat;
    }

    private function uidTakencheck() {
        return !$this->checkUsers($this->uid, $this->email);
    }
}

