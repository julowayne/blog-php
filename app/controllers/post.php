<?php 

function postIndex(){
    $posts = getAllposts();
    view('posts/index.php', compact('posts'));
}

function postShow(){
    if (empty($_GET['id'])) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }
    $post = getPostById($_GET['id']);
    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }
    require __DIR__ . "/../../views/posts/show.php";
}
function postCreate(){
    require __DIR__ . "/../../views/posts/postForm.php";
}

function postStore(){
    if (empty($_POST['title']) or empty($_POST['body'])) {
        $_SESSION['messages'] = ['message' => 'Les champs Contenu et titre doivent être remplis', 'type' => 'alert alert-danger'];
        $_SESSION['old_inputs'] = $_POST;
        header('location:/articles/create');
        exit;
    }
    $post = addPost($_POST);
    $_SESSION['messages'] = $post ? ['message' => 'Nouvel article enregistré', 'type' => 'success'] : ['message' => 'Erreur lors de l\'enregistrement de l\'article', 'type' => 'danger'];
    header('location:/articles');
    exit;
}

function postEdit(){
    if (empty($_GET['id'])) {
        http_response_code(404);
        echo "<html><body>Page non trouvée</body></html>";
        return;
    }
    $post = getPostById($_GET['id']);
    if (!$post) {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
    require __DIR__ . "/../../views/posts/postForm.php";
}

function postUpdate(){
    if (empty($_POST['title']) or empty($_POST['body'])) {
        $_SESSION['messages'] = ['message' => 'Les champs Contenu et titre doivent être remplis', 'type' => 'alert alert-danger'];
        $_SESSION['old_inputs'] = $_POST;
        header('location:/articles/edit?id='.$_GET['id']);
        exit;
    }
    $post = updatePost($_GET['id'], $_POST);
    $_SESSION['messages'] = $post ? ['message' => 'Article modifié', 'type' => 'success'] : ['message' => 'Erreur lors de la modification de l\'article', 'type' => 'danger'];
    header('location:/articles');
    exit;
}

function postDestroy(){
    if (empty($_GET['id'])) {
        http_response_code(404);
        echo "<html><body>Page non trouvée</body></html>";
        return;
    }
    $post = deletePost($_GET['id']);
    $_SESSION['messages'] = $post ? ['message' => 'Article supprimé', 'type' => 'success'] : ['message' => 'Erreur lors de la suppression de l\'article', 'type' => 'danger'];
    header('location:/articles');
    exit;
};