<?php
    class Random_move_generator extends Controller {
        var $models = array('moves', 'types');

        function index() {
            $d['types'] = $this->types->getTypes();
            $d['typesid'] = $this->types->getTypesId();
            $d["random_moves"] = $this->moves->getRandomMoves($d['typesid']);
            $this->set($d);

            $this->render('index');
        }
    }
?>