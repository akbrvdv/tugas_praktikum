<?php
try {
    if (empty($_POST['username'])) {
        throw new Exception("Username tidak boleh kosong!");
    }
    echo "Login berhasil";
} catch (Exception $e) {
    echo "<p style='color:red'>" . $e->getMessage() . "</p>";
}
?>

<form method="post">
    Username: <input type="text" name="username">
    <input type="submit" value="Login">
</form>
