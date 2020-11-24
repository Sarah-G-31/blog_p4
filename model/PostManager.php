<?php

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function postsList()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM posts ORDER BY id DESC');

        return $posts;
    }

    public function post($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postsPost($title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
        $posts->execute(array(htmlspecialchars($title), htmlspecialchars($content)));
    
        return $posts;
    }

   public function editPost($postId, $title, $content)
   {
        $db = $this->dbConnect();
        $edit = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $edit->execute(array($title, $content, $postId));

        return $edit;
   }

   public function deletePost($postId)
   {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM posts WHERE id = ?');
        $delete->execute(array($postId));
   }
}