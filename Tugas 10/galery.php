<!DOCTYPE html>
<html>
<body>

<h2>Galeri Gambar</h2>
<?php
$dir = "gambar/";
$files = array_diff(scandir($dir), array('.', '..'));

foreach ($files as $file) {
  $path = $dir . $file;
  echo "<img src='$path' width='150' style='margin:10px'>";
}
?>

</body>
</html>
