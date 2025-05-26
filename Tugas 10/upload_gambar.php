<!DOCTYPE html>
<html>
<body>

<form action="upload_gambar.php" method="post" enctype="multipart/form-data">
  Pilih gambar untuk diupload:
  <input type="file" name="gambar" multiple><br>
  <input type="submit" value="Upload Gambar" name="submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['gambar'])) {
  $total = count($_FILES['gambar']['name']);
  for ($i = 0; $i < $total; $i++) {
    $tmpFilePath = $_FILES['gambar']['tmp_name'][$i];
    if ($tmpFilePath != "") {
      $newFilePath = "gambar/" . basename($_FILES['gambar']['name'][$i]);
      move_uploaded_file($tmpFilePath, $newFilePath);
      echo "Gambar berhasil diupload: " . $_FILES['gambar']['name'][$i] . "<br>";
    }
  }
}
?>

</body>
</html>
