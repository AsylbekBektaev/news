<?php
   namespace app\DB;
   use PDO;
use PDOException;
use PDORow;

class DBManager{
      private $connection;
      public function __construct($host, $dbname, $user, $password){
          try{
              $this->connection = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$password);
          }catch (PDOException $e) {
              echo "Error!: " . $e->getMessage() . "<br/>";
          }
      }
      public function getConnection(){
         return $this->connection;
      }
   }
?>