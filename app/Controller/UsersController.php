<?php

namespace App\Controller;

use App;
use App\Auth\AppDBAuth;
use Core\HTML\BootstrapForm;

class UsersController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }

    public function login() {    
        $errors = false;
        if(!empty($_POST)) {
            $auth = AppDBAuth::getInstance(App::getInstance()->getDb());
            if($auth->login($_POST['email'], $_POST['password']))
                header('Location: index.php?page=posts.index');
            else
                $errors = true;
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }
    
    public function sign_in() {
        $error_message = '';

        if(!empty($_POST)) {

            foreach($_POST as $k => $v) {
                $_POST[$k] = trim($_POST[$k]);
            }

            extract($_POST);

            if(
                $username == '' ||
                $email == '' ||
                $password == '' ||
                $password2 == ''
            ) {
                $error_message = 'Veuillez remplir tous les champs';
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message = 'E-mail invalide';
            } elseif($this->User->findByEmail($email)) {
                $error_message = 'Cet adresse E-mail est déjà associé à un compte';
            } elseif($password != $password2) {
                $error_message = 'Veuillez vous assurer que les mots de passe insérés soient les mêmes';
            } else {
                $result = $this->User->create(
                    [
                        'username' => $username,
                        'email' => $email,
                        'password' => sha1($password),
                    ]
                );

                if($result) {
                    $auth =AppDBAuth::getInstance(App::getInstance()->getDb());
                    $auth->login($_POST['email'], $_POST['password']);
                    header('Location: index.php?page=posts.index');
                } else {
                    $error_message = 'Inscription impossible';
                }
            }

        }
        
        $form = new BootstrapForm($_POST);
        $this->render('users.sign_in', compact('form', 'error_message'));
    }

}