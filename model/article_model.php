<?php
    class Article_model extends Model {
        var $table = 'article';

        function getArticles($cond = array()) {
            $innerjoin = array(
                'fields' => 'article.id, article.title, article.thumbnail, article.content, article.dateArt, cat.lib as cat, acc.login',
                'inner' => 'INNER JOIN account acc ON article.idAccount = acc.id INNER JOIN article_category cat ON article.idArticleCategory = cat.id'
            );
            $arts = $this->find(array_merge($cond, $innerjoin));
            foreach($arts as $a) {
                $a->dateArt = date("m/d/Y", strtotime($a->dateArt));
            }
            return $arts;
        }
        
        function getArticle($num = null) {
            if($num === null) {
                return $this->findLast();
            }
            // debug($num);
            return $this->getArticles(array(
                'limit' => 'limit 1',
                'condition' => 'article.id = '.$num
            ));
        }
        
        function getLastArticles($n = 6) {
            return $this->getArticles(array('limit'=> 'LIMIT '.$n));
        }

        function getFeatured() {
            $this->table = 'featured';
            $id =  $this->find(array('fields' => 'MAX(featured.id) as id', 'inner' => 'INNER JOIN article ON featured.idArticle = article.id INNER JOIN account acc ON article.idAccount = acc.id'));
            $this->table = 'article';
            return $this->getArticle($id[0]->id);
        }

        function trimArticle($article, $len = 250) {
            $lastspaceindex = strrpos($article->content, " ", -(strlen($article->content) - 250));
            $article->content = substr($article->content, 0, $lastspaceindex) . "...";
        }
    }

?>