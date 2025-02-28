<?php

class Database 
{

    private $connection;

    public function __construct($db_server, $db_user, $db_password, $db_name)
    {
       $this->connection = new mysqli($db_server, $db_user, $db_password, $db_name);  
       
       if($this->connection->connect_error)
       {
           die("Connection failed: " . $this->connection->connect_error);
       }
    }

    public function validateUser($username, $password)
    {
        if($this->checkUsernameAndPassword($username, $password)) {
            return true;
        } else {
            $_SESSION['error'] = "Login failed";
            return false;
        } 
        }

    public function loggedIn()
    {
        if($_SESSION['authorized'] == true)
        {
            return true;
        } else {
            return false;
        }
    }    

    public function loginRequired()
    {
        if($this->loggedIn()){
            return true;
        } else {
            return false;
        }
    }

    public function query($sql)
    {
       $stmt = $this->connection->prepare($sql);
       $stmt->execute();
       $meta = $stmt->result_metadata();

       $parameters = [];
       while($field = $meta->fetch_field()) {
          $parameters[] = &$row[$field->name];
       }

       $results = [];
       call_user_func_array([$stmt, 'bind_result'], $parameters);

       while($stmt->fetch()) {
          $x = [];
           foreach($row as $key => $val) {
              $x[$key] = $val;
           }
           $results[] = $x;
       }
       $stmt->close();
       return $results;  
    }

    public function countQuery($query)
    {
      if($stmt = $this->connection->prepare($query)){
         $stmt->execute();
         $stmt->bind_result($result);
         $stmt->fetch();
         $stmt->close();
      }
    }

    public function insertQuery($data, $table)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        if($stmt = $this->connection->prepare($query)) {
            $stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));
            $stmt->execute();
            $stmt->close();
        }
    }

    public function updateQuery($data, $id, $table)
    {
        $setStatement = implode('=?, ', array_keys($data)) . '=?';
        $query = "UPDATE $table SET $setStatement WHERE id=$id";

        $types = str_repeat('s', count($data)) . 'i';
        $values = array_merge(array_values($data), [$id]);

        if($stmt = $this->connection->prepare($query)) {
          $stmt->bind_param($types, ...$values);
          $stmt->execute();
          $stmt->close();
        }
    }

    public function deleteQuery($id, $table)
    {
        $query = "DELETE FROM ? WHERE id=? LIMIT 1";
        if($stmt = $this->connection->prepare($query)) {
            $stmt->bind_param('si', $table, $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    public function checkUsernameAndPassword($username, $password)
    {
       $query = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
       if($stmt = $this->connection->prepare($query)) {
        $pass = md5($password);

        $stmt->bind_param('ss', $username, $pass);
        $stmt->execute();
        $stmt->bind_result($id ,$username, $password);

        if($stmt->fetch()){
            $_SESSION['authorized'] = true;
            $_SESSION['username'] = $username;
            return true;
        } else {
            return false;
        }

        $stmt->close();
       }

    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function errorMessages()
    {

        $message = '';
        if($_SESSION['error'] != ''){
           $message = '<span class="success" id="message">'. $_SESSION['success'].'</span>';
           $_SESSION['success'] = '';
        }

        if($_SESSION['error'] != '') {
            $message = '<span class="error" id="message">' . $_SESSION['error'] . '</span>';
            $_SESSION['error'] = '';
         }
         return $message;
    }
   
}
