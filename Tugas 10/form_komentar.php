<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nama: <input type="text" name="name"><br>
  Email: <input type="text" name="email"><br>
  Komentar: <textarea name="comment" rows="5" cols="40"></textarea><br>
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(trim($_POST["name"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $comment = htmlspecialchars(trim($_POST["comment"]));

  echo "<h3>Output:</h3>";
  echo "Nama: $name<br>";
  echo "Email: $email<br>";
  echo "Komentar: $comment<br>";
}
?>

</body>
</html>
