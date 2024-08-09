<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$ext = explode('/', $_FILES['file']['type'])[1];
$file_path = "uploads/" . $_POST['username'] . "." . $ext;
if (!move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
  echo "Sorry, there was an error uploading your image.";
}

include_once("dbconfig.php");
$sql = 'INSERT INTO users (firstName,lastName,userName,email,password,pic,address,country,gender,department)
                        VALUES (?,?,?,?,?,?,?,?,?,?)';

$stmt = $conn->prepare($sql);
$stmt->execute([
  $_POST['firstName'], $_POST['lastName'], $_POST['username'], $_POST['email'], $_POST['password'],
  $file_path, $_POST['address'], $_POST['country'], $_POST['gender'], $_POST['department']
]);

$result = $stmt->rowCount();

$id = $conn->lastInsertId();
// echo '=======' . $result;

if (isset($result)) {
  header("Location:http://localhost/php_day4/login.html");
}
