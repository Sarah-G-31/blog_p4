<?php
require_once('model/PostManager.php');

function addPosts($title, $content) {
    $postManager = new PostManager();
    $posts = $postManager->postsPost($title, $content);

    header('Location: index.php?admin=menu');
}

function editPosts($postId) {
    $postManager = new PostManager();
    $post = $postManager->post($_GET['id']);

    if (empty($post['id'])) {
        throw new Exception('Ce post n\'existe pas !');
    } 
    else {
        require('view/backend/editPostsView.php');
    }
}