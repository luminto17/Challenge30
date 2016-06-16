<form method="post" action="post.php"> 
  <div class="form-group">
  <h3>Title</h3>
  <input style="width:320px" type="text" name="title" value="<?php if (!empty($title)) echo $title ?>"> <br>
  <h3>Body</h3>
  <textarea rows="10" cols="40" name="body"><?php if (!empty($body)) echo $body ?></textarea> <br> <br>
  <input type="hidden" name="form-submitted" value="1"/>
  <input type="submit" name="submit" value="Submit">
</form>