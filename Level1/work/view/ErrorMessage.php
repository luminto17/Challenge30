<!DOCTYPE html>
<html>
  <head>
    <title>Level 1</title>
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>
    <center>
      <?php foreach ($errors as $error) : ?>
      <p><span class="error"><?php echo $error ?></span></p>
      <?php endforeach ?>
      
      <div>
        <?php include ('view/FormBulletin.php') ?>
      </div>
    </center>
  </body>
</html>