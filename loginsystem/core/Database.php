<?php

 error_reporting(1);
 //database connection 
 class Database{
    
   public  $conn;
   public function __construct() {
      try {
         $conn = new PDO("mysql:host=localhost;dbname=tables;port=3306;charset=utf8mb4;user=root");
      //  echo "Database Connect Succsessful!";
         return $conn;
      }
      catch(PDOException $e) {
         echo "Connection failed: ".$e->getMessage();
      }
   }
 }
//  $database= new Database();
// $db=$database->__construct();
// print_r($db);
