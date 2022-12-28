<?php

namespace App\Controller;

use App\Controller\AppController;

class PostsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index() {
        // $posts = $this->Post->last();
        // $categories = $this->Category->all();
        $this->render('posts.index');
    }

    public function category() {
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

    public function show() {
        $post = $this->Post->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('post'));
    }

}