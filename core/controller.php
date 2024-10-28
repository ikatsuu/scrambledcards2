<?php
    class Controller {
        var $vars = array();
        var $layout = "default";
        var $table;

        function __construct() {
            //chargement de tous les modeles en mémoire
            if(!empty($this->models)) {
                foreach($this->models as $a) {
                    $this->loadModel($a);
                }
            }
            $this->session = new Session();
        }

        function render($file) {
            extract($this->vars);
            //buffer start
            ob_start();
            require(ROOT."view/".get_class($this)."/".$file.".php");
            $content = ob_get_clean();
            $title = get_class($this);
            if($this->layout == false) {
                echo $content;
            }
            else {
                require(ROOT.'view/layout/'.$this->layout.".php");
            }
        }

        function set($d) {
            $this->vars = array_merge($this->vars, $d);
        }

        function loadModel($name) {
            require("model/".strtolower($name)."_model.php");
            $modelname = $name . "_model";
            $this->$name = new $modelname();
        }

    }

?>