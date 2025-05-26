<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["login_user"] = $_POST["username"];
  echo "Selamat datang, " . $_SESSION["login_user"];
}
?>

<form method="post">
  Username: <input type="text" name="username">
  <input type="submit" value="Login">
</form>
