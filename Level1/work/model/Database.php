<?php

class Database {
  private $conn       = NULL;
  private $serverName = 'localhost';
  private $username   = 'root';
  private $password   = NULL;
  private $dbName     = 'bulletin_board';

  public function connect()
  {
    $this->conn = mysqli_connect($this->serverName, $this->username, $this->password, $this->dbName);

    if (!$this->conn) {
      die ("Could not connect : " . mysqli_connect_error());
    }
  }

  public function disconnect()
  {
    mysqli_close($this->conn);
  }

  public function fetch($table, $columns = null, $condition = null, $order = null, $limit = null, $offset = null)
  {
    $results = array();

    if (empty($columns)) {
      $columns = '*';
    }

    $sql = "SELECT {$columns} FROM {$table}";

    if (!empty($condition)) {
      $sql .= " WHERE {$condition}";
    }

    if (!empty($order)) {
      $sql .= " ORDER BY {$order}";
    }

    if (!empty($limit)) {
      $sql .= " LIMIT {$limit}";
    }

    if (!empty($offset)) {
      $sql .= " OFFSET {$offset}";
    }

    $result = mysqli_query($this->conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $results[] = $row;
    }
  	
    return $results;
  }

  public function insert($table, $arrValues)
  {
    $keys   = array_keys($arrValues);
    $keys   = implode(', ', $keys);

    $values = array_values($arrValues);
    $values = "'" . implode("', '", $values) . "'";

    $sql    = "INSERT INTO {$table}({$keys}) VALUES ({$values})";
    
    return mysqli_query($this->conn, $sql);  
  }
}