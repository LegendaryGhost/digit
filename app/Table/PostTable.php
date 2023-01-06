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
                'SELECT articles.id, articles.content, articles.image, articles.article_date, articles.article_hour, users.username as user
                FROM articles
                LEFT JOIN users
                    ON articles.id_publish = users.id
                ORDER BY articles.article_date DESC;'
            );
        }

    }

?>