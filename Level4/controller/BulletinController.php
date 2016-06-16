<?php

require_once('model/Database.php');
require_once('model/Bulletin.php');
require_once('lib/Pagination.php');
require_once('lib/Functions.php');

class BulletinController
{ 
  public function post()
  {
    $bulletinObj   = new Bulletin();
    $paginationObj = new Pagination($bulletinObj->count('id', "is_alive = 1"));

    $title     = get_value('title');
    $body      = get_value('body');
    $id        = get_value('id');
    $page      = get_value('page');
    $action    = get_value('action');
    $submitted = get_value('submitted');
	  $file      = get_value('fileToUpload');    
    $image     = null;

    $errors = $bulletinObj->validate($title, $body, $file);

    if ($submitted === "Cancel") {
      header('Location:index.php?page=' . $page . '#bulletins');
      exit;
    }

    if (empty($errors)) { //No errors detected
      if ($action === "Edit") { //Edit
        $deleteImage = get_value('deleteImage'); //Check if Delete checkbox is checked

        if ($bulletinObj->verify($id, $page)) {
          $paginationObj->setCurrentPage($page);
        }

        if (!empty($file) && $deleteImage !== "on") {
          $image = addslashes(file_get_contents($file['tmp_name'])); //SQL Injection defence!
        }

        $bulletinObj->update(array(
            'title' => $title, 
            'body'  => $body,
            'image' => $image
             ), 
            "id = {$id}"
          );

        $paginationObj->setTotalPage($bulletinObj->count(null, "is_alive = 1"));

        if ($page > $paginationObj->getTotalPage()) {
          header('Location:index.php?page=' . $paginationObj->getTotalPage() . '#bulletins');
          exit;
        }

      } else { //Insert new bulletin
        if (!empty($file)) { //file ready to be uploaded
          $image = addslashes(file_get_contents($file['tmp_name'])); //SQL Injection defence!
        }
        
        $bulletinObj->insert(array(
          'title'      => $title, 
          'body'       => $body,
          'image'      => $image,
          'is_alive'   => 1
        ));
      }

      header('Location:index.php?page=' . $paginationObj->getCurrentPage() . '#bulletins');
      exit;
    } else { //Errors detected
      if ($action === 'Edit' && $bulletinObj->verify($id, $page)) { //Display bulletin data after verification
        $bulletin = $bulletinObj->fetch(null, "id = {$id} AND is_alive = 1");

        $image = $bulletin[0]['image'];
      }

      include('view/Error.php');
    }
  }

  public function showBulletins()
  {
    $bulletinObj   = new Bulletin();
    $paginationObj = new Pagination($bulletinObj->count("id", "is_alive = 1"));

    $paginationObj->setCurrentPage(get_value('page'));

    $pageNumbers = $paginationObj->getPageNumbers();

    $paginationObj->setUri("http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");

    $bulletins = $bulletinObj->fetch(
      null, 
      "is_alive = 1", 
      "id DESC", 
      $paginationObj->getItemPerPage(), 
      $paginationObj->getOffset()
    );

    include('view/BulletinBoard.php');
  }

  public function delete()
  {
    $bulletinObj   = new Bulletin();
    $paginationObj = new Pagination($bulletinObj->count("id", "is_alive = 1"));

    $id        = get_value('id');
    $page      = get_value('page');
    $submitted = get_value('submitted');

    if ($bulletinObj->verify($id, $page)) {
      $paginationObj->setCurrentPage($page);  
    }

    $bulletin = $bulletinObj->fetch(null, "id = {$id} AND is_alive = 1");

    if (!empty($submitted)) {
      if ($submitted === "Yes") {
        $bulletinObj->delete("id={$id}");

        $paginationObj->setTotalPage($bulletinObj->count(null, "is_alive = 1"));

        if ($page > $paginationObj->getTotalPage()) {
          header('Location:index.php?page=' . $paginationObj->getTotalPage() . '#bulletins');
          exit;
        }
      }

      header('Location:index.php?page=' . $paginationObj->getCurrentPage() . '#bulletins');
      exit;
    }

    $title = $bulletin[0]['title'];
    $body  = $bulletin[0]['body'];
    $time  = $bulletin[0]['created_at'];

    include('view/Delete.php');
  }

  public function edit()
  {
    $bulletinObj = new Bulletin();

    $id     = get_value('id');
    $page   = get_value('page');
    $action = "Edit";

    if ($bulletinObj->verify($id, $page)) { //Display bulletin after verification
      $bulletin = $bulletinObj->fetch(null, "id = {$id} AND is_alive = 1");

      $title = $bulletin[0]['title'];
      $body  = $bulletin[0]['body'];
      $image = $bulletin[0]['image'];

      include('view/Edit.php');
    }
  }
}