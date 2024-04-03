<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Đây là trang chủ hihi</h1>
    <form action="index.php" method="post" style="display: inline-block;">
        <input type="hidden" name="action" value="login">
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <form action="index.php" method="post" style="display: inline-block;">
        <input type="hidden" name="action" value="signup">
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</body>
</html>