<?php

    namespace App\Table;

    use Core\Table\Table;

    class UserTable extends Table{

        public function findByEmail($email){
            return $this->query(
                'SELECT * FROM ' . $this->table .
                ' WHERE email = ?;',
                [$email],
                true
            );
        }

    }

?>