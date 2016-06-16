<?php require_once('lib/Functions.php') ?>
<form method="post" action="post.php" enctype="multipart/form-data">
  <div class="row" style="width:600px;">
    <div class="input-field">
      <input id="title" style="width:100%" type="text" name="title" value="<?php if (!empty($title)) echo h($title) ?>"> <br>
      <label for="title">Title</label>
    </div>
    <div class="input-field">
      <textarea id="textarea" rows="10" class="materialize-textarea" cols="40" style="width:100%" name="body"><?php if (!empty($body)) echo h($body) ?></textarea> <br> <br>
      <label for="textarea">Textarea</label>
    </div>
    <?php if (!empty($image)) : ?>
      <div class="input-field">
        <img src="<?php echo "data:image/jpeg;base64," . base64_encode($image) ?>">
        <input type="checkbox" name="deleteImage" id="deleteImage">
        <label for="deleteImage">Delete Image</label>
      </div>
    <?php endif ?>
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="fileToUpload">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Insert Image">
      </div>
    </div>
    <input type="hidden" name="id" value="<?php if(!empty($id)) echo h($id) ?>">
    <input type="hidden" name="page" value="<?php if(!empty($page)) echo h($page) ?>">
    <input type="hidden" name="action" value="<?php if (!empty($action)) echo h($action) ?>">
    <br>
    <button class="btn waves-effect waves-light" type="submit" name="submitted" value="Submit">Submit
      <i class="material-icons right">send</i>
    </button>
    <?php if (!empty($action)) : ?>
      <button class="btn waves-effect waves-light red" type="submit" name="submitted" value="Cancel">Cancel</button>
    <?php endif ?>
  </div>
</form>
