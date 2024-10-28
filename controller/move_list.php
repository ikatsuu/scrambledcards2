<?php
    class Move_list extends Controller {
        var $models = array("moves", "types", "favourites");

        function index() {
            $d['types'] = $this->types->getTypes();
            if($this->session->isLogged()) {
                $d['moves'] = $this->moves->getMovesByTypes($d['types'], $this->session->read('user')->id);
            }
            else {
                $d['moves'] = $this->moves->getMovesByTypes($d['types']);
            }
            // debug($d['moves']);
            $this->set($d);
            $this->render('index', $d);
        }

        function updateFav($id) {
            $movefromfavs = $this->favourites->getMove(array(
                'condition' => 'idMove = ' . $id,
                'order' => 'idMove'
            ));

            $idAccount = $this->session->read('user')->id;
            
            if (count($movefromfavs) == 0) {
                $ordre = $this->favourites->getMove(array(
                    'fields' => 'MAX(ordre) as id',
                    'condition' => 'idAccount =' . $idAccount,
                    'order' => 'favourites.idAccount'
                ));
                // debug($ordre[0]);
                if($ordre[0]->id === null) {
                    $ordre = 0;
                }
                else {
                    $ordre = $ordre[0]->id +1;
                }
                
                $this->favourites->save(array(
                    'idMove' => $id,
                    'idAccount' => $idAccount,
                    'ordre' => $ordre
                ));
                echo 'red';
            }
            else {
                $this->favourites->delete("idMove = ". $id);
                echo 'white';
            }
        }
    }
?>