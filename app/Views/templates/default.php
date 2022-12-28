<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-5.2.0-beta1/dist/css/bootstrap.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar bg-primary navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand text-white" href="index.php?page=users.login">Digit</a>
        </div>
      </div>
    </nav>

    <div class="container">

        <div class="starter-template" style="padding-top: 100px;">
            <?= $content; ?>
        </div>

    </div><!-- /.container -->
  </body>
</html>
