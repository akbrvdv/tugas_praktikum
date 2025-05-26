<!DOCTYPE html>
<html>
<body>

<?php
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = htmlspecialchars(trim($_POST["username"]));
  $password = htmlspecialchars(trim($_POST["password"]));

  if (empty($username) || empty($password)) {
    $error = "<span style='color:red; font-size:small;'>Username dan Password wajib diisi!</span>";
  } else {
    echo "Login berhasil: $username";
  }
}
?>

<form method="post" action="">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Login"><br>
  <?php echo $error; ?>
</form>

</body>
</html>
