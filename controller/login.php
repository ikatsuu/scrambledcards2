<?php
    class Login extends Controller {
        var $models = array("login");

        function index() {
            // debug($_POST);
            // debug($_SESSION);
            $d = array();

            if(!empty($_POST['button'])) {
                //cas login
                if($_POST['button'] == 'login') {
                    $user = $this->login->getUser($_POST['login'], $_POST['loginpassword']);
                    if(!empty($user)) {
                        $this->session->setFlash("> You successfully connected to your account.");
                        $this->session->write('user', $user);
                    }
                    else {
                        $this->session->setFlash("> Invalid credentials, please try again.", "danger");
                    }

                    // si login et mdp ok
                    if($this->session->isLogged()) {
                        header("Location: ". WEBROOT2 ."/");
                    }
                    else {
                        $this->render('index');
                    }
                }

                //cas signup
                else if($_POST['button'] == 'signup') {
                    $login = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $isDataOk = $this->login->checkData($login, $email, $password);
                    if($isDataOk) {
                        $result = $this->login->newUser($login, $email, $password);

                        if($result === true) {
                            $this->session->setFlash('Your account has been successfully created. You can now login below.');
                            $this->render('index');
                        }
                        else {
                            $this->session->setFlash($result, "danger");
                            $this->render('index');                       
                        }
                    }
                }
            }
            else {
                $this->render('index');
            }
        }

        function logout() {
            unset($_SESSION['user']);
            $this->layout = 'default';
            $this->session->setFlash("> You successfully logged out.", "warning");
            $this->render('index');
        }
    }
?>