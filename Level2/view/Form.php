<?php require_once('lib/Functions.php') ?>
<form method="post" action="post.php"> 
  <div class="row" style="width:600px;">
    <div class="input-field">
      <input id="title" style="width:100%" type="text" name="title" value="<?php if (!empty($title)) echo h($title) ?>"> <br>
      <label for="title">Title</label>
    </div>
    <div class="input-field">
      <textarea id="textarea" rows="10" class="materialize-textarea" cols="40" style="width:100%" name="body"><?php if (!empty($body)) echo h($body) ?></textarea> <br> <br>
      <label for="textarea">Textarea</label>
    </div>
    <br>
    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
  </div>
</form>
