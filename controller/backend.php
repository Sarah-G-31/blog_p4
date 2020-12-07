<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function postsAndReports() {
    $postManager = new PostManager();
    $posts = $postManager->postsList();

    $commentManager = new CommentManager();
    $reports = $commentManager->getReports();

    require('view/backend/adminView.php');
}

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

    header('Location: index.php?admin=menu');
}

function deletePost($postId) {
    $postManager = new PostManager();
    $delete = $postManager->deletePost($postId);

    header('Location: index.php?admin=menu');
}

function getReports() {
    $commentManager = new CommentManager();
    $reports = $commentManager->getReports();

    require('view/backend/adminView.php');
}

function deleteComment($commentId) {
    $commentManager = new CommentManager();
    $delete = $commentManager->deleteComment($commentId);

    header('Location: index.php?admin=menu');
}

function cancelReport($commentId) {
    $commentManager = new CommentManager();
    $cancel = $commentManager->cancelReport($commentId);

    header('Location: index.php?admin=menu');
}