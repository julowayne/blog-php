<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<link rel="stylesheet" href="./public/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<body>
<nav class="navbar navbar-light bg-info">
  <a class="navbar-brand" href="/articles">Back-Office du blog</a>
</nav>

<div class="container">
  <div class="content">
    <?= $content ?>
  </div>
</div>
</body>
</html>
<style>
  body {
        background-color: #F8F8F8;
        padding: 0;
    }
  .content {
    background-color: #FEFDFD;
    padding: 2em;
    border-radius: 2px;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
  }  
  form > a, button {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
  }
  .navbar {
    margin-bottom: 3em;
  }
  h1 {
    margin-bottom: 1em;
  }
</style>