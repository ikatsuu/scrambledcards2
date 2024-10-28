<?php
    class Favourites extends Controller {
        var $models = array('favourites');

        function index() {
            if($this->session->isLogged()) {
                $d['favourites'] = $this->favourites->getFavs($this->session->read('user')->id);
                $this->set($d);
                $this->render('index');
            }
            else {
                header("Location: ". WEBROOT2 ."/login");
            }
        }

        function deleteFav($id) {
            if($this->session->isLogged()) {
                $this->favourites->delete("idMove = " . $id);
            }
        }
    }
?>