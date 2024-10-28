<?php
    class Favourites_model extends Model {
        var $table = 'favourites';

        function getMove($cond) {
            return $this->find($cond);
        }

        function getFavs($idAcc) {
            return $this->find(array(
                'fields' => 'moves.*, favourites.id as idFav, difficulty.lib',
                'condition' => 'idAccount = ' . $idAcc,
                'inner' => 'INNER JOIN moves on favourites.idMove = moves.id INNER JOIN difficulty on moves.difficulty = difficulty.id'
            ));
        }
    }
?>