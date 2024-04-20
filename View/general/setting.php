<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    require_once 'View/general/navbar.php';
    ?>
    <div class="container">
        <h2>Changing Password</h2>
        <form action="setting.php" method="post">
            <input type="text" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="new_password" placeholder="New Password" required><br>
            <input type="hidden" name="action" value="change-password-check">
            <button type="submit" class="button">Change</button>
        </form>

    </div>
</body>

</html>