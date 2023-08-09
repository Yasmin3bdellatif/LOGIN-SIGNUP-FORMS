<?php

class LoginContr extends Signup {

   
    private $pwd;
    private $email;

    public function __construct( $pwd, $email) {
        $this->pwd = $pwd;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
     
        }

        $this->getUsers($this->pwd, $this->email);
    }

    private function emptyInput() {
        return !empty !empty($this->pwd) && !empty($this->email) ;

    }
}
