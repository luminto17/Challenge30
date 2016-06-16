<?php

require_once('model/Database.php');
require_once('model/Bulletin.php');
require_once('lib/Pagination.php');
require_once('lib/Functions.php');

class BulletinController
{ 
  public function post()
  {    
    $title = get_value('title');
    $body  = get_value('body');

    $errors = $bulletinObj->validate($title, $body);

    if (empty($errors)) {
      $bulletinObj->insert(array(
          'title'    => $title, 
          'body'     => $body,
          'is_alive' => 1
        ));

      header('Location:index.php');
      exit;
    }

    include('view/Error.php');
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

    if ($this->verify($id, $page)) {
      $paginationObj->setCurrentPage($page);  
    }

    $bulletin = $bulletinObj->fetch(null, "id = {$id} AND is_alive = 1");

    if (!empty($submitted)) {
      if ($submitted === "Yes") {
        $bulletinObj->delete("id=" . $id);

        $paginationObj->setTotalPage($bulletinObj->count(null, "is_alive = 1"));

        if ($page > $paginationObj->getTotalPage()) {
          header('Location:index.php?page=' . $paginationObj->getTotalPage() . '#bulletins');
          exit;
        }
      }

      header('Location:index.php?page=' . $paginationObj->getCurrentPage() . '#bulletins');
      exit;
    }

    $title      = $bulletin[0]['title'];
    $body       = $bulletin[0]['body'];
    $createTime = $bulletin[0]['created_at'];

    include('view/Delete.php');
  }

  public function edit()
  {
    $bulletinObj = new Bulletin();

    $id     = get_value('id');
    $page   = get_value('page');
    $action = get_value('action');

    $this->verify($id, $page);

    if (empty($action)) {
      $bulletin = $bulletinObj->fetch(null, "id = {$id} AND is_alive = 1");

      $title  = $bulletin[0]['title'];
      $body   = $bulletin[0]['body'];
      $action = "Edit";

      include('view/Edit.php');

    } else {
      $title     = get_value('title');
      $body      = get_value('body');
      $submitted = get_value('submitted'); //Submit Button in Edit Page

      if ($submitted === "Cancel") { //For Cancel in Edit Page
        header('Location:index.php?page=' . $page . '#bulletins');
        exit;
      }

      $errors = $bulletinObj->validate($title, $body);

      if (empty($errors)) {
        $bulletinObj->update(array(
          'title' => $title, 
          'body'  => $body), 
          "id = {$id}"
        );

        header('Location:index.php?page=' . $page . '#bulletins');
        exit;
      }

      include('view/Error.php');
    }
  }

  private function verify($id, $page)
  {
    $bulletinObj   = new Bulletin();
    $paginationObj = new Pagination($bulletinObj->count("id", "is_alive = 1"));

    if (empty($id) || empty($page)) {
      header('HTTP/1.1 400 Bad Request');
      exit;
    }    

    $count = $bulletinObj->count('id', "id = {$id} AND is_alive = 1");

    if (!$paginationObj->verifyPage($page) || $count === 0) {
      header('HTTP/1.1 404 Not Found');
      exit;
    }

    return true;
  }  
}