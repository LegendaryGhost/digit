<?php

namespace App\Auth;

use Core\Auth\DBAuth;
use Core\Database\Database;

class AppDBAuth extends DBAuth {

    private static $_instance;

    public static function getInstance(Database $db){
        if(is_null(self::$_instance)){
            self::$_instance = new AppDBAuth($db);
        }
        return self::$_instance;
    }

    /**
     * Allows the user to login
     *
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function login($email, $password) {
        $user = $this->db->prepare('SELECT * FROM users WHERE email = ?', [$email], null, true);
        if($user) {
            if($user->password == sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    public function logged() {
        return isset($_SESSION['auth']);
    }

}