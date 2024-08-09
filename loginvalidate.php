<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("dbconfig.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
};


$query = "SELECT * FROM users where username = :username";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch();

var_dump($result);

if ($result && $result['userName'] == $_POST['username'] && $result['password'] == $password = $_POST['password']) {
  $_SESSION['username'] = $_POST['username'];
  header('Location:http://localhost/php_day4/home.php');
  exit();
} else {
  print 'wrong email or password';
}
