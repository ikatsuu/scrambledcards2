<?php
	class Login_model extends Model {
        var $table = "account";

        function getUser($login,$password) {
            return $this->findFirst(
                array(
                    'fields' => 'id, login, email, idPermissions, isVerified',
                    'condition' => "(email = '" . $login. "' OR login = '".$login."' ) and password = '". hash('sha256', $password) . "'"
                )
            );
        }

        function isEmailValid($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            return true;
        }
        
        function isUsernameValid($username) {
            if (strpos($username, ' ') !== false) {
                return false;
            }
            return true;
        }
            
        function isPasswordValid($p) {
            $char = preg_quote("$&+,:;=?@#|'<>.^*()%!-");
            if(strlen($p) < 8) {
                return "password needs to be at least 8 characters long";
            }
            else if(!preg_match("#[0-9]+#", $p)) {
                return "password must contains at least one number";
            }
            else if(!preg_match("#[a-zA-Z]+#", $p)) {
                return "password must contains at least one letter";
            }
            else if(!preg_match("#[0-9]+#", $p)) {
                return "password must contains at least one number";
            }
            
            else if(!preg_match("#[". $char ."]+#", $p)) {
                return "password must contains at least one special character";
            }
            else {
                return true;
            }
        }
        
        function checkData($username, $email, $password) {
            if(!$this->isUsernameValid($username)) {
                return "username not valid";
            }
            if(!$this->isEmailValid($email)) {
                return "email not valid";
            }
            if(!$this->isPasswordValid($password) === true) {
                return isPasswordValid($_POST['password']);
            }
            return true;
        }
        
        
        function newUser($login, $email, $password) {
            //test doublon username
            $error = array();
            $error['email'] = $this->find(array('fields' => 'email', 'condition' => 'email = "'. $email .'"'));
            $error['login'] = $this->find(array('fields' => 'login', 'condition' => 'login = "' . $login.'"'));
            
            if(!empty($error['email'])) {
                $error = true;
                return "there is already an account with this email address";
            }

            if(!empty($error['login'])) {
                $error = true;
                return "there is already an account with this username";
            }


            
            if(empty($error['email']) && empty($error['login'])) {
                $this->save(array(
                    'login' => $login,
                    'email' => $email,
                    'password' => hash('sha256', $password),
                    'idPermissions' => 0,
                    'isVerified' => 0
                ));
                return true;
                
            }
        }
    }
?>