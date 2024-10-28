<?php
    class Home extends Controller {
        var $models = array("article");

        function index() {
            $d['articles'] = $this->article->getLastArticles();

            for($a = 0; $a < 3; $a++) {
                $this->article->trimArticle($d['articles'][$a]);
            }

            for($a = 3; $a < 6; $a++) {
                $this->article->trimArticle($d['articles'][$a], 150);
            }
            
            $this->set($d);
            $this->render('index');
        }
    }
?>