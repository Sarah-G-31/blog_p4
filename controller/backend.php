<?php
require_once('model/PostManager.php');

function addPosts($title, $content) {
    $postManager = new PostManager();
    $posts = $postManager->postsPost($title, $content);

    header('Location: index.php?admin=menu');
}

function post($postId) {
    $postManager = new PostManager();
    $post = $postManager->post($_GET['id']);

    if (!empty($post['id']) && $_GET['admin'] == 'editPosts') {
        require('view/backend/editPostView.php');
    }
    elseif (!empty($post['id']) && $_GET['admin'] == 'deletePosts') {
        require('view/backend/deletePostView.php');
    }
    else {
        throw new Exception('Ce post n\'existe pas !');
    }
}

function editPost($postId, $title, $content) {
    $postManager = new PostManager();
    $edit = $postManager->editPost($postId, $title, $content);

    header('Location: index.php?admin=editPosts');
}

function deletePost($postId) {
    $postManager = new PostManager();
    $delete = $postManager->deletePost($postId);

    header('Location: index.php?admin=deletePosts');
}
