<?php

require_once 'model/Database.php';
require_once 'model/Bulletin.php';

class BulletinController
{ 
  private $bulletinObj = NULL;

  public function __construct()
  {
    $this->bulletinObj = new Bulletin();
  }

  public function insert()
  {
    $title  = isset($_POST['title']) ? $_POST['title'] : NULL;
    $body   = isset($_POST['body']) ? $_POST['body'] : NULL;

    $errors = $this->bulletinObj->validate($title, $body);

    if (empty($errors)) {
      $this->bulletinObj->insert(array(
        'title' => $title, 
        'body'  => $body
      ));

      header('Location: index.php');
    } else {
      include('view/ErrorMessage.php');
    }
  }

  public function showBulletins()
  {
    $bulletins = $this->bulletinObj->fetch(NULL, NULL, 'created_at DESC');

    include('view/BulletinBoard.php');
  }
}