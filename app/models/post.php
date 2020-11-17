<?php 
use Carbon\Carbon;


function getAllPosts() {
    $db = dbConnect();
    $statement = $db->query('SELECT id, title, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts');
    return $statement->fetchAll(PDO:: FETCH_OBJ);
}

function getPostById(){
    $db = dbConnect();

    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $_GET['id']]);
    $post = $statement->fetchObject();
    if($post){
        $post->created_at = ucfirst(Carbon::parse($post->created_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans());
    }
    return $post;
}
function addPost($informations){
    $db = dbConnect();
    $statement = $db->prepare('INSERT INTO posts (title, body) VALUES ( :title, :body )');
    $statement->execute([
        'title' => $informations['title'],
        'body' => $informations['body']
    ]);
    return $statement;
}

function updatePost($id, $informations){
    $db = dbConnect();

    $statement = $db->prepare('UPDATE posts SET title = ?, body = ?, updated_at = ?  WHERE id = ?');
    $statement->execute([
        $informations['title'],
        $informations['body'],
        Carbon::now('Europe/Paris'),
        $id
    ]);
    return $statement;
}

function deletePost($id){
    $db = dbConnect();

    // $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    // $statement->execute(['id' => $_GET['id']]);
    // $post = $statement->fetchObject();

    $statement = $db->prepare('DELETE FROM posts WHERE id = ?');
    $post = $statement->execute([$id]);

    return $post;
}