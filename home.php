<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (!isset($_SESSION['username'])) {
  // If not logged in, redirect to login page
  header("Location: login.html");
  exit();
}
?>
<?php
include_once('header.php');
?>
<tr>
  <td colspan=9>
    <?php echo 'content only visible to ' . $_SESSION['username']; ?>
  </td>
</tr>

<?php
include_once('footer.php');
?>
</br></br>
<form action="logout.php" method="POST">
    <button type="submit">Logout</button>
</form>