<?php
require_once('model/PostManager.php');

function addPosts($title, $content) {
    $postManager = new PostManager();
    $posts = $postManager->postsPost($title, $content);
}