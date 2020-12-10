<?php
namespace Database;

class DB {
  private const SERVERNAME = 'localhost';
  private const USERNAME = 'root';
  private const PASSWORD = '';
  private const DBNAME = 'cours_php';
  private $conn;
  private $row;
  private static $db_instance;

  public static function getInstance(){
    if(is_null(self::$db_instance)){
      self::$db_instance = new DB();
    }
    return self::$db_instance;
  }

  private function __construct() {
    $this->conn = new \mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
  }

  function callDB($sql) {
    if ($this->conn->query($sql)) {
        return 'ok';
    } else {
        return $this->conn->error;
    };
  }

  function fetchDB($sql) {
      $result = $this->conn->query($sql);
      $tabResults = [];
      while ($row = mysqli_fetch_assoc($result)) {
        array_push($tabResults, $row);
      }
      return $tabResults;
  }

  function singlerowDB($sql) {
      $result = $this->conn->query($sql);
      $tabResults = [];
      $tabResults = mysqli_fetch_assoc($result);
      return $tabResults;
  }

}
