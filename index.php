<!-- PDO -> PHP Data Object -> tidak tergantung dengan databasenya -->
<?php

  $server = 'localhost';
  $user   = 'root';
  $pw     = '';
  $dbname = 'pdo_tuts';

  try { // kalau tidak berjalan akan menangkap error
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Berhasil Conect ke Database";
  }catch(PDOException $e){
    echo "Error ".$e->getMessage();
  }


 //======== 1. menampilkan data

 $result=$conn->query("SELECT * FROM users");
 $total=$result->rowCount();
 // die(var_dump($result->fetch()));
 while ($row=$result->fetch(PDO::FETCH_OBJ)){
   echo $row->username . ' ' . $row->password . '<br>';
   // echo $row['password'] . '<br>';
 }
 echo "Total: " . $total;
 
 //======== 2. Perpared Statement
