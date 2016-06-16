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
      header('HTTP/1.1 500 Internal Server Error');
      exit;
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

  public function update($table, $arrValues, $condition)
  {
    $sql = "UPDATE {$table} SET ";

    $array = array();
    foreach ($arrValues as $key => $value) {
      $array[] = "{$key} = '{$value}'";
    }

    $data = implode(', ', $array);

    $sql .= "{$data} WHERE {$condition}";

    return mysqli_query($this->conn, $sql);
  }

  public function delete($table, $condition)
  {
    $sql = "DELETE FROM {$table} WHERE {$condition}";

    return mysqli_query($this->conn, $sql);
  }

  public function count($table, $column = null, $condition = null)
  {
    if (empty($column)) {
      $column = "*";
    }

    $sql = "SELECT COUNT({$column}) AS result FROM {$table}";

    if (!empty($condition)) {
      $sql .= " WHERE {$condition}";
    }

    $result = mysqli_query($this->conn, $sql);
    $count  = mysqli_fetch_assoc($result);

    return (int)$count['result'];
  }
}
