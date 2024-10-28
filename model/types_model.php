<?php
    class Types_model extends Model {
        var $table = 'move_type';

        function getTypes() {
            return $this->find(array());
        }

        function getTypesId() {
            $id = array();
            $typesidarray = $this->find(array("fields" => "id"));
            foreach($typesidarray as $t) {
                $id[] = $t->id;
            }
            return $id;
        }
    }

?>