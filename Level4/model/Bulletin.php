<?php

require_once('model/Database.php');

class Bulletin
{  
  private $db    = NULL;
  private $table = 'bulletin_board';

  public function __construct()
  {
    $this->db = new Database();

    $this->db->connect();
  }

  public function fetch($columns = null, $condition = null, $order = null, $limit = null, $offset = null)
  {
    return $this->db->fetch($this->table, $columns, $condition, $order, $limit, $offset);
  }

  public function insert($values)
  {
    return $this->db->insert($this->table, $values);
  }

  public function delete($condition, $isSoftDelete = true)
  {
    if ($isSoftDelete) {
      return $this->db->update($this->table, array('is_alive' => '0'), $condition);  
    } else {
      return $this->db->delete($this->table, $condition);
    }
  }

  public function update($arrValues, $condition)
  {
    return $this->db->update($this->table, $arrValues, $condition);
  }

  public function count($column = null, $condition = null)
  {
    return $this->db->count($this->table, $column, $condition);
  }

  public function validate($title, $body, $file = null)
  {
    $errors = array();

    if (empty($title)) {
      $errors[] = 'You must fill in the Title box';
    } elseif (strlen($title) < 10 || strlen($title) > 32) {
      $errors[] = 'Your title must be 10 to 32 characters long';
    }

    if (empty($body)) {
      $errors[] = 'You must fill in the Body box';
    } elseif (strlen($body) < 10 || strlen($body) > 200) {
      $errors[] = 'Your message must be 10 to 200 characters long';
    }

    if (!empty($file["name"])) {
      $target_file   = "uploads/" . basename($file["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if(!getimagesize($file["tmp_name"])) {
        $errors[] = "File is not an image";
      } elseif ($file["size"] > 1000000) {
        $errors[] = "Your image is only valid 1MB or less";
      } elseif (file_exists($target_file)) {
        $errors[] = "Sorry, file already exists.";
      } elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      }
    }

    return $errors;
  }

  public function verify($id, $page)
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