<?php

    namespace App\Table;

    use Core\Table\Table;

    class PostTable extends Table{

        protected $table = 'articles';

        /**
         * get last articles
         * @return array
         */
        public function last(){
            return $this->query(
                'SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
                FROM articles
                LEFT JOIN categories
                    ON articles.categorie_id = categories.id
                ORDER BY articles.date DESC;'
            );
        }

        public function findWithCategory($id){
            return $this->query(
                'SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie, articles.categorie_id FROM ' . $this->table . '
                LEFT JOIN categories
                    ON articles.categorie_id = categories.id
                WHERE articles.id = ?;',
                [$id],
                true
            );
        }

        public function lastByCategory($category_id){
            return $this->query(
                'SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
                FROM articles
                LEFT JOIN categories
                    ON articles.categorie_id = categories.id
                WHERE articles.categorie_id = ?
                ORDER BY articles.date DESC;',
                [$category_id]
            );
        }

    }

?>