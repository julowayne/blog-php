<?php $title = "My blog"; ?>
<?php ob_start(); ?>
<?php $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
<div class="col">
  <h2><a href="/articles">Retour</a> </h2>
  <?php if(isset($_SESSION['messages'])): ?>	
              <h3 class="<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></h3>		
  <?php endif; ?>
  <form class="form-group" action="<?= isset($post) || (isset($_SESSION['old_inputs']) && $uri == "/articles/edit") ? 'edit?id='.$_GET['id'] : '/articles' ?>" method="post" >
      <label for="title">Titre:</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= isset($post) && !empty($post) ? $post->title : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['title'] : '' ?>"><br>
      <div for="created"><strong>Création:</strong> <?= isset($post) && !empty($post) ? $post->created_at : '' ?><?= isset($_SESSION['old_inputs']['created_at']) ? $_SESSION['old_inputs']['created_at'] : '' ?></div><br>
      <label for="article-content">Contenu de l'article:</label>
      <textarea class="form-control" rows="3" id="article-content" name="body"><?php if (!empty($_SESSION['old_input']['body'])): ?><?= $_SESSION['old_input']['body'] ?><?php elseif(isset($post)): ?><?= $post->body ?><?php endif; ?></textarea><br>
      <input class="btn btn-lg btn-success mt-2" name="save" type="submit" value="Enregistrer" />
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/default.php"; ?>