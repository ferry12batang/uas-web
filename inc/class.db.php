<?php

namespace Inc;

use mysqli;

/**
 * The class for database connection initialization
 * 
 * @since 1.0.0
 * @version 1.0.0
 * @author Cak Adi <cakadi190@gmail.com>
 * @package siperpus-simple
 */
class DBConnection
{
  /**
   * Connection result
   * @var \mysqli|null $connection The connection result
   */
  protected $connection;

  /**
   * Preparing DB Connection
   * 
   * @since 1.0.0
   * @author Cak Adi <cakadi190@gmail.com>
   */
  public function __construct($hostname, $username, $password, $database, $port = 3306)
  {
    $this->connection = new mysqli($hostname, $username, $password, $database, $port)
      or die("Sorry, the database cannot connect seamlessly.");
  }

  /**
   * Getting current connection
   * 
   * @return \mysqli $connection
   * @since 1.0.0
   * @version 1.0.0
   * @author Cak Adi <cakadi190@gmail.com>
   */
  public function getConnection()
  {
    return $this->connection;
  }

  
  /**
   * Execute a SELECT query
   * 
   * @since 1.0.2
   * @version 1.0.2
   * @author Cak Adi <cakadi190@gmail.com>
   * @param string $table The table name to select from
   * @param string[] $columns The columns to select (optional, defaults to '*')
   * @return array|null Returns the result of the SELECT query as an associative array or null on failure
   */
  public function select($table, $columns = ['*'])
  {
    $tableCols = implode(", ", $columns);
    $stmt = $this->connection->prepare("SELECT $tableCols FROM $table");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $result->free_result();
      return $data;
    } else {
      return null;
    }
  }

  /**
   * Extend the select method with a WHERE clause
   * 
   * @param string $table The table name to select from
   * @param string[] $columns The columns to select (optional, defaults to '*')
   * @param string|array $conditions The WHERE conditions as a string or an associative array of column-value pairs
   * @return array|null Returns the result of the SELECT query as an associative array or null on failure
   */
  public function where($table, $conditions, $columns = ['*'])
  {
    $whereClause = '';
    $values = [];

    if (is_array($conditions)) {
      foreach ($conditions as $column => $value) {
        $whereClause .= "$column = ? AND ";
        $values[] = $value;
      }
      $whereClause = rtrim($whereClause, ' AND ');
    } elseif (is_string($conditions)) {
      $whereClause = $conditions;
    } else {
      return null;
    }

    $tableCols = implode(", ", $columns);
    $stmt = $this->connection->prepare("SELECT $tableCols FROM $table WHERE $whereClause");
    $stmt->bind_param(str_repeat("s", count($values)), ...$values);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $result->free_result();
      return $data;
    } else {
      return null;
    }
  }

  /**
   * The insertion query
   * 
   * @since 1.0.0
   * @version 1.0.0
   * @author Cak Adi <cakadi190@gmail.com>
   * @param string $table The table name to insert data
   * @param string[] $data the data with key column to insert it
   * @return array|false|null|string
   */
  public function insert($table, $data)
  {
    // Prepare table first
    $columns      = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));
    $values       = array_values($data);

    // Insert Query
    $stmt = $this->connection->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
    $stmt->bind_param(str_repeat("s", count($values)), ...$values);

    // Run and check if is successfully inserted or not
    if ($stmt->execute()) {
      $query = self::getConnection()->prepare("SELECT * FROM {$table} WHERE id = LAST_INSERT_ID()");
      $query->execute();
      $returns = $query->get_result()->fetch_assoc();

      return $returns;
    } else {
      return "Error inserting data: " . $stmt->error;
    }

    // Don't forget Close connection
    $stmt->close();
  }

  /**
   * The update query
   *
   * @author Cak Adi <cakadi190@gmail.com>
   * @since 1.0.0
   * @version 1.0.0
   * @param string $table The table name to update data
   * @param string[] $data The data with key column to update
   * @param string $condition The condition for the update query
   */
  public function update($table, $data, $condition)
  {
    // Prepare the SET clause
    $setClause = "";
    foreach ($data as $column => $value) {
      $setClause .= "$column = ?, ";
    }
    $setClause = rtrim($setClause, ", ");

    // Prepare the UPDATE query
    $stmt = $this->connection->prepare("UPDATE $table SET $setClause WHERE $condition");

    // Bind the values
    $types = str_repeat("s", count($data));
    $values = array_values($data);
    $stmt->bind_param($types, ...$values);

    // Run and check if the update was successful or not
    if ($stmt->execute()) {
      return true;
    } else {
      return "Error inserting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
  }
}
