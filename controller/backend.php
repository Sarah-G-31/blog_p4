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

function editPost($id, $title, $content) {
    $postManager = new PostManager();
    $edit = $postManager->editPost($id, $title, $content);

    header('Location: index.php?admin=editPosts');
}

function deletePost($postId) {

    $retour_billet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets WHERE id = :id');
    $retour_billet->execute(array($postId));
    $donnees_billets = $retour_billet->fetch();
}
