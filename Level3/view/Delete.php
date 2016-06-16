<?php require_once('lib/Functions.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="view/materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="view/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <title>Level 3 - Delete Confirmation</title>
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
      <h2>Delete Confirmation</h2>
    </center>
    <div class="container" style="width:600px; margin: 0 auto;">
      <form method="post" action="delete.php">
        <ul class="collection" style="padding: 20px;">
          <div class="row">
            <div class="col s2">
              <i class="large material-icons icon-red" style="margin-top:20px;">warning</i>
            </div>
            <div class="col s8">
              <h4><?php echo h($title) ?></h3>
              <p class="flow-text"><?php echo h($body) ?></p>
            </div>
          </div>
        <div style="text-align:right;">
          <a class="secondary-content"><i class="material-icons">query_builder</i><?php echo h($createTime) ?></a><br>
        </div>
      </ul>
      <input type="hidden" name="id" value="<?php echo h($id) ?>">
      <input type="hidden" name="page" value="<?php echo h($page) ?>">
      <div class="container center">
        <div class="row">
          <h5>Are you sure?</h5>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light red" type="submit" name="submitted" id="delete" value="Yes">Yes</button>
          <button class="btn waves-effect waves-light" type="submit" name="submitted" value="Cancel">Cancel</button>
        </div>
      </div>
      </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>      
    <script src="view/materialize/js/materialize.js"></script>
    <script src="view/materialize/js/init.js"></script>
  </body>
</html>
