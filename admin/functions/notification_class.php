<?php

class NotificationClass
{
  private $table = 'tbl_notification';
  private $connection;
  
  public function __construct($conn)
  {
    $this->connection = $conn;
  }

  public function save($user_id, $title, $msg)
  {
    $qry = "INSERT INTO ".$this->table." (title, description, user_id)VALUES('$title', '$msg', '$user_id')";
    $this->connection->query($qry);
  }
}