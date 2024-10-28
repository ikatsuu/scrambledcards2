<?php
    class Articles extends Controller {
        var $models = array("article", "moves");

        function index() {
            $d['articles'] = $this->article->getArticles();
            
            foreach($d['articles'] as $a) {
                $this->article->trimArticle($a);
            }
            
            $d['featured'] = $this->article->getFeatured()[0];
            $this->article->trimArticle($d['featured']);

            $d['motw'] = $this->moves->getMotw()[0];

            $this->set($d);
            $this->render('index');
        }

        function read($n = null) {
            if($n === null) {
                echo '404 not found';
            }
            else {
                $art = $this->article->getArticle($n);
                if($art != null) {
                    $d['art'] = $art;
                    $this->set($d);
                    $this->render('read');
                }
                else {
                    echo 'l\'article n\'existe pas';
                }
            }
        }
    }
?>