<?php

require_once('model/Database.php');
require_once('model/Bulletin.php');
require_once('lib/Pagination.php');
require_once('lib/Functions.php');

class BulletinController
{
  public function post()
  {
    $bulletinObj = new Bulletin();

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

    if (empty($id) || empty($page)) {
      header('HTTP/1.1 400 Bad Request');
      exit;
    }

    $bulletin = $bulletinObj->fetch(null, "id = {$id} AND is_alive = 1");

    if (!$paginationObj->verifyPage($page) || empty($bulletin)) {
      header('HTTP/1.1 404 Not Found');
      exit;
    }

    $paginationObj->setCurrentPage($page);

    if (!empty($submitted)) {
      if ($submitted === "Yes") {
        $bulletinObj->delete("id=" . $id, true);
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
}