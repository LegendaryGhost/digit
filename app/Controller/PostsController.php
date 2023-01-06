<?php

namespace App\Controller;

use \App;
use App\Auth\AppDBAuth;
use Core\HTML\BootstrapForm;
use App\Controller\AppController;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index() {
        if(!AppDBAuth::getInstance(App::getInstance()->getDb())->logged())
            $this->forbidden();

        $posts = $this->Post->last();
        
        $this->render('posts.index', compact('posts'));
    }

    public function add() {
        if(!AppDBAuth::getInstance(App::getInstance()->getDb())->logged())
            $this->forbidden();

        if(!empty($_POST)) {
            $image = $_FILES['image']['name'];
            
            if($image != '') {
                $new_image_name = $this->gen_file_name($image);
                $destination = ROOT . '/pictures/' . $new_image_name;
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                $this->Post->create([
                    'id_publish' => $_SESSION['auth'],
                    'content' => $_POST['content'],
                    'image' => $new_image_name
                ]);
            } else {
                $this->Post->create([    
                    'id_publish' => $_SESSION['auth'],
                    'content' => $_POST['content']
                ]);
            }
            return $this->index();
        }

        $form = new BootstrapForm($_POST);

        $this->render('posts.add', compact('form'));
    }

    private function gen_file_name($name) {
        $gen_name = md5(microtime()) . $name;
        
        while(file_exists(ROOT . '/' . $gen_name))
            $gen_name = md5(microtime()) . $name;

        return $gen_name;
    }

}