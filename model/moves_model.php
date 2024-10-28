<?php
    class Moves_model extends Model {
        var $table = 'moves';

        function getMoves($cond = array()) {
            $innerjoin = array(
                'inner' => 'INNER JOIN difficulty ON moves.difficulty = difficulty.id'
            );
            return $this->find(array_merge($cond, $innerjoin));
        }

        function getMovesByTypes($types, $idAccount = null) {
            $moves = array();
            
            foreach($types as $t) {
                $cond = array(
                    'condition' => 'idMoveType = ' . $t->id
                );
                if($idAccount !== null) {
                    $cond = array(
                        'fields'=> 'moves.*, favourites.id as idFav',
                        'condition' => 'idAccount = ' . $idAccount . ' OR idMoveType = ' . $t->id,
                        'inner' => 'LEFT JOIN favourites ON favourites.idMove = moves.id'
                    );
                }
                $moves[] = $this->find($cond);
            }
            return $moves;
        }

        function getRandomMoves($typesid) {
            $moves = array();
            foreach ($typesid as $id) {
                $moves[] = $this->getMoves(array(
                    "condition" => "idMoveType = " . $id,
                    "order" => "rand()",
                    "limit" => 'LIMIT 1'
                ));
            }
            return $moves;
        }

        function getMotw() {
            $this->table = "motw";
            $motw = $this->find(array(
                'condition' => "motw.id = (SELECT MAX(motw.id) FROM motw)",
                'inner' => "INNER JOIN moves ON motw.idMove = moves.id"
            ));
            $this->table = "moves";
            return $motw;
        }
    }
?>