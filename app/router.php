<?php 
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($uri == "/articles") {
        // Index des articles
        postIndex();
    } elseif ($uri == "/articles/show" and isset($_GET['id'])) {
        // Show an article
        postShow();
    } elseif ($uri == "/articles/create"){
        //Formulaire de création d'un article
        postCreate();
    }elseif ($uri == "/articles/edit" and isset($_GET['id'])){
        //Modification d'un article
        postEdit();
    }else {       
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
} elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($uri == "/articles"){
        //Créaction d'un article
        postStore();
    }elseif ($uri == "/articles/edit" and isset($_GET['id'])){
        //Modification d'un article
        postUpdate();
    }else if($uri == "/articles/delete" and isset($_GET['id'])){
        //Suppression d'un article
        postDestroy();
    }else {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
} else {
    var_dump($_SERVER['REQUEST_METHOD']);
    http_response_code(405);
    echo "<html><body>Method not allowed</body></html>";
    return;
}
if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);}