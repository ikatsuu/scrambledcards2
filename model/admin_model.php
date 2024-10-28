<?php
    class Admin_model extends Model {
        var $table = 'moves';

        function isDuplicate($move) {
            return !empty($this->find(array(
                'condition' => '(name = "' . $move['name'] . '" AND creator = "'. $move['creator'] .'") OR link = "' . $move['link'] . '"'
            )));
        }
    }

?>