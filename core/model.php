<?php
    class Model {
        public $id;
        public $table;
        public $conf = 'default';
        public $db;

        function  __construct() {
			//on fait appel à notre configuration bdd par défaut
			$conf=conf::$databases[$this->conf];
			
			try {
				$this->db = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
                    $conf['login'],
                    $conf['password'],
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')     //on force Mysql à se connecter en utf8
				);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
			}
		}
        
        function save($data) {
            if(empty($data['id'])) {
                //insert
                // unset($data['id']);
                $sql = "INSERT INTO ". $this->table . " (";
                $values = "";
                foreach($data as $key=>$value) {
                    $sql .= $key.",";
                    $values.= ":".$key.",";
                }
                $sql = substr($sql, 0, -1);
                $values = substr($values, 0, -1);
                $sql .= ") VALUES (". $values . ");";

                $stmt = $this->db->prepare($sql);
                if($stmt->execute($data)) {
                    return true;
                }
                return false;
            } else {
                //update
                $this->id = $data['id'];
                unset($data['id']);

                $sql = "UPDATE ". $this->table . " SET ";
                foreach($data as $key=>$value) {
                    $sql.= $key."=:".$key.",";
                }
                $sql = susbtr($sql, 0, -1);
                $sql .= "WHERE id=".$this->id.";";

                $stmt = $this->db->prepare($sql);
                if($stmt->execute($data)) {
                    return true;
                }
                return false;

            }
        }

        //find : tout select possible
		function find($data) {
			$fields="*";
			$condition="1=1";
			$order=$this->table.".id";
			$limit=" ";
			$inner=" ";
			
			if (isset($data["fields"])) {
				$fields=$data["fields"];	
			}
			if (isset($data["condition"])) {
				$condition=$data["condition"];	
			}
			if (isset($data["order"])) {
				$order=$data["order"];	
			}
			if (isset($data["limit"])) {
				$limit=$data["limit"];	
			}
			if (isset($data["inner"])) {
				$inner=$data["inner"];	
			}
			
			$sql = 'SELECT '.$fields.' FROM '.$this->table.' ' .$inner.' WHERE '.$condition.' ORDER BY '.$order.' '.$limit;

			// echo $sql . "<br>";
			
			$stmt = $this->db->prepare($sql);
			if ($stmt->execute()) {
				$data = $stmt->fetchAll(PDO::FETCH_OBJ);
				return $data;
			} else {
				echo "<br /> erreur SQL";
			}	
		}	

		function findFirst($data) {
			return current($this->find($data));
		}

		function delete($condition) {
			$sql='DELETE FROM '.$this->table.' WHERE ' . $condition;
			$stmt = $this->db->prepare($sql);
			if ($stmt->execute()) {
			} else {
				echo "<br /> erreur SQL";
			}	
		}		
    
    }
?>