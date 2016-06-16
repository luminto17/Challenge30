<?php require_once('lib/Pagination.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="view/materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="view/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <title>Level 2 - Bulletin Board</title>
    <style>
      .paging {
        margin: 0 2px;
        padding: 5px;
        border: solid 1px black;
        text-decoration: none;
      }

      .active {background-color : #DDDDDD;}
      .clearfix:before,
      .clearfix:after {
        content:'';
        display:table;
      }
      .clearfix:after{
        clear:both;
      }
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
    <h2>Post Here!</h2>
    <div style="width:600px;">
      <div>
        <?php include('view/Form.php') ?>
      </div>
      <br><a href="#bulletins">Check out the Bulletins Board</a>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <ul id="bulletins" class="collapsible popout" data-collapsible="accordion">
        <h3>Bulletins Board</h3>
        <hr>
        <?php foreach ($bulletins as $bulletin) : ?>
        <li>
          <form action="delete.php" method="GET">
            <div class="collapsible-header active amber darken-1">
              <div class="col s12 m8 offset-m2 l6 offset-l3">
                <div class="row valign-wrapper">
                  <div class="card-panel" style="width:520px;">
                    <h4 class="truncate" style="text-align:left;"><?php echo h($bulletin['title']) ?></h3><hr>
                    <p class="flow-text" style="text-align:justify;"><?php echo h($bulletin['body']) ?></p>
                    <input type="hidden" name="id" value="<?php echo h($bulletin['id']) ?>">
                    <input type="hidden" name="page" value="<?php echo h($paginationObj->getCurrentPage()) ?>">
                    <div class="clearfix">
                      <div style="float:left">
                        <button class="btn waves-effect waves-light red" type="submit">Delete</button>
                      </div>
                      <div style="float:right">
                        <a href="#!" class="secondary-content"><i class="material-icons">query_builder</i><?php echo h($bulletin['created_at']) ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="collapsible-body"><p style="background-color:white;"></p></div>
          </form>
        </li><br>
        <?php endforeach ?>
      </ul>
    </div>

    <br> <br>
    <ul class="pagination">
    <?php if ($paginationObj->hasPreviousPage()) : ?>
      <li class="waves-effect"><a href="<?php echo h($paginationObj->createUri($paginationObj->getPreviousPageNumber()) . '#bulletins') ?>"><i class="material-icons">chevron_left</i></a></li>
    <?php endif ?>

    <?php foreach ($pageNumbers as $pageNumber) : ?>
      <?php if ($pageNumber === $paginationObj->getCurrentPage()) : ?>
        <li class="active"><a><?php echo h($pageNumber)?></a></li>
      <?php else : ?>
        <li class="waves-effect"><a href="<?php echo h($paginationObj->createUri($pageNumber) . '#bulletins') ?>"><?php echo h($pageNumber)?></a></li>
      <?php endif ?>

    <?php endforeach ?>

    <?php if ($paginationObj->hasNextPage()) : ?>
      <li class="waves-effect"><a href="<?php echo h($paginationObj->createUri($paginationObj->getNextPageNumber()) . '#bulletins') ?>" ><i class="material-icons">chevron_right</i></a></li>
    <?php endif ?>
    </ul>

    <script type="text/javascript" src="js/materialize.min.js"></script>      
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="view/materialize/js/materialize.js"></script>
    <script src="view/materialize/js/init.js"></script>
    </center>
  </body>
</html>
