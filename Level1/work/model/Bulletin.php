<?php

require_once 'model/Database.php';

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

  public function validate($title, $body)
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

    return $errors;
  }
}