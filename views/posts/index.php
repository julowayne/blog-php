<?php $title="My-blog"; ?>

<?php ob_start(); ?>
  <h1>Liste des articles <a class="btn btn-primary" href="articles/create">Ajouter un article</a></h1>
  <?php if(isset($_SESSION['messages'])): ?>
      <h2>
              <div class="alert alert-<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></div>
      </h2>
    <?php endif; ?>
    <table class="table table-hover p-2">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Article</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($posts as $post): ?>
        <tr>
          <th scope="row"><?= $post->id?></th>
          <td><a href="/articles/show?id=<?= $post->id?>"><?= $post->title ?></a></td>
          <td><?= $post->created_at_fr?></td>
          <form action="/articles/delete?id=<?= $post->id?>" method="post">
            <td>
              <a href="/articles/edit?id=<?= $post->id?>" type="button" class="btn btn-info">Modifier</a>
              <button onclick="return confirm('êtes vous sur ?')" class="btn btn-danger">Supprimer</button>
            </td>
          </form>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>




<?php $content = ob_get_clean(); ?>

<?php require __DIR__  . "/../layouts/default.php"; ?>
