<!DOCTYPE html>
<html>
  <head>
    <title>Level 1</title>
  </head>
  <body>
    <center>
      <div>
        <?php include ('view/FormBulletin.php') ?>
      </div>
      
      <?php foreach ($bulletins as $bulletin) : ?>
        <hr style='width:300px'>
        <h3><?php echo $bulletin['title'] ?></h3>
        <?php echo $bulletin['body'] ?> <br>
        <?php echo $bulletin['created_at'] ?> <br>
      <?php endforeach ?>

      <br>
    </center>
  </body>
</html>