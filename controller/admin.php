<?php
    class Admin extends Controller {
        var $models = array("admin");

        function index() {
            if($this->session->isLogged()) {
                if($_SESSION['user']->idPermissions >= 3) {
                    if(!empty($_POST)) {
                        $move = array('link' => $_POST['link'], 'name' => $_POST['name'], 'creator' => $_POST['creator'] );
                        if(!$this->admin->isDuplicate($move)) {
                            $this->admin->save($_POST);
                            $this->session->setFlash("> Move successfully added to the database");
                        }
                        else {
                            $this->session->setFlash("> Error when adding move to database, might be a duplicate", 'danger');
                        }
                    }


                    $this->render('index');
                }
            }
            else {
                // header("Location: /". WEBROOT2 ."/");
                header('HTTP/1.0 403 Forbidden', true, 403);
            }
        }
    }
?>