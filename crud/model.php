<?php

function db_connect(){
$servername = "localhost";
$username = "admin";
$password = "root";
$dbname = "exer";
global $conn;
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}

//READ
function getAll(){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM users");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetchAll();
  return $data;
}

//CREATE
function createUser($username, $password, $email, $age, $img){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("INSERT INTO users (username, pass, email, age, img)
  VALUES (:username, :pass, :email, :age, :img)");
  $stmt->bindValue (':username', $username);
  $stmt->bindValue (':pass', $password);
  $stmt->bindValue (':email', $email);
  $stmt->bindValue (':age', $age, PDO::PARAM_INT);
  $stmt->bindValue (':img', $img);
  $done = $stmt->execute();
  if($done)
  echo "ADDED";
}


//UPATE
function updateUsers($id, $username, $password, $email, $age, $img){
  db_connect();
  global $conn;
  $stmt = $conn->prepare("UPDATE users SET username=:username, pass=:pass, email=:email, age=:age, img=:img WHERE id=:id");
  $stmt->bindValue (':username', $username);
  $stmt->bindValue (':pass', $password);
  $stmt->bindValue (':email', $email);
  $stmt->bindValue (':age', $age, PDO::PARAM_INT);
  $stmt->bindValue (':img', $img);
  $stmt->bindValue (':id', $id, PDO::PARAM_INT);
  $done = $stmt->execute();
  if($done)
  echo "UPDATED";
}


//DELETE
function deleteUser($id){
db_connect();
global $conn;
  $stmt = $conn->prepare("DELETE FROM users WHERE id=:id");
  $stmt->bindValue (':id', $id, PDO::PARAM_INT);
  $done = $stmt->execute();
  if($done)
  echo "DELETED";
}






function create_table(){
  db_connect();
  global $conn;
  $sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  email VARCHAR(50) NOT NULL,
  age INT(3) UNSIGNED NOT NULL,
  img VARCHAR(50) DEFAULT 'profile.png',
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

  // use exec() because no results are returned
  $conn ->exec("DROP TABLE users");
  $conn->exec($sql);
  echo "Table users created successfully";
  $conn = null;
}






?>