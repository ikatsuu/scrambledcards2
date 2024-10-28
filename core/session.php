<?php
    class Session {
        function __construct() {
            if(!isset($_SESSION)) {
                session_start();
            }
        }

        public function setFlash($message, $type = 'success') {
            $_SESSION['flash'] = array(
                "message" => $message,
                'type' => $type
            );
        }

        public function flash() {
            if(!empty($_SESSION['flash']['message'])) {
                $html = '<div class="alert alert-'.$_SESSION['flash']['type'].'" role="alert">'.$_SESSION['flash']['message'].'</div>';
                $_SESSION['flash'] = array();
                return $html;
            }
        }

        public function write($key, $value) {
            $_SESSION[$key] = $value;
        }

        public function read($key) {
            if($key) {
                if(!empty($_SESSION[$key])) {
                    return $_SESSION[$key];
                }
            }
            else {
                return $_SESSION;
            }
            return false;
        }

        public function isLogged() {
            return !empty($_SESSION['user']->login);
        }

        // public function user($key) {
        //     if($this->read('user')) {
        //         if(!empty($this->read('user')->key)) {
        //             return $this->read('user')->key;
        //         }
        //     }
        //     return false;
        // }
    }
?>