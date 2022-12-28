<?php

namespace App\Auth;

use Core\Auth\DBAuth;

class AppDBAuth extends DBAuth {

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

}