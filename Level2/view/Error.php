<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="view/materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="view/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <title>Level 2 - Error</title>
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>
    <nav class="cyan darken-1" role="navigation">
      <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo white-text">Internship Training</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html" class="white-text"><i class="material-icons left">search</i>Link with Left Icon</a></li>
          <li><a href="badges.html" class="white-text"><i class="material-icons right">view_module</i>Link with Right Icon</a></li>
        </ul>
      </div>
    </nav>
    <center>
      <?php foreach ($errors as $error) : ?>
        <p><span class="error"><?php echo $error ?></span></p>
      <?php endforeach ?>
      <h2>Post Here!</h2>
      <?php include('view/Form.php') ?>
    </center>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="view/materialize/js/materialize.js"></script>
    <script src="view/materialize/js/init.js"></script>
  </body>
</html>