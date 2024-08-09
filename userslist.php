<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("dbconfig.php");
$query = "SELECT * FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchall();


?>
<style>
  table,tr,td,th{
    border: 1px solid black;
    text-align:center;
  }
  td,th{
    padding: 10px;
  }
</style>

<table>
  <tr>
    <th>Fname</th>
    <th>Lname</th>
    <th>username</th>
    <th>email</th>
    <th>address</th>
    <th>country</th>
    <th>gender</th>
    <th>department</th>
    <th>Actions</th>
  </tr>
  <?php

  for ($i = 0; count($result) > $i; $i++) {
  ?>
    <tr>
      <td> <?php echo $result[$i]['firstName'] ?> </td>
      <td> <?php echo $result[$i]['lastName'] ?> </td>
      <td> <?php echo $result[$i]['userName'] ?> </td>
      <td> <?php echo $result[$i]['email'] ?> </td>
      <td> <?php echo $result[$i]['address'] ?> </td>
      <td> <?php echo $result[$i]['country'] ?> </td>
      <td> <?php echo $result[$i]['gender'] ?> </td>
      <td> <?php echo $result[$i]['department'] ?> </td>
      <td> 
        <form action="deleteuser.php" method="POST">
          <input type="text" value="<?php echo $result[$i]['userName'] ?>" hidden >
          <input type="submit" value="Delete">
        </form>
        <form action="register.html" method="POST">
          <input type="text" value="<?php echo $result[$i]['userName'] ?>" hidden >
          <input type="submit" value="Edit">
        </form>
      </td>
    </tr>
  <?php
  };
  ?>
</table>