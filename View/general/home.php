<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <style>
    /* Global styles */
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-image: url('Lib/images/hcmut_background.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    #box{
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    #box:hover{
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    }
  </style>
</head>

<body>
  <div id="box" class="d-flex flex-column justify-content-center align-items-center">
    <p class="display-5">Đăng nhập để sử dụng dịch vụ ✨</p>
    <div id="button-group" class="">
      <form action="index.php" method="post" style="display: inline-block;">
        <input type="hidden" name="action" value="login">
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <form action="index.php" method="post" style="display: inline-block;">
        <input type="hidden" name="action" value="signup">
        <button type="submit" class="btn btn-secondary">Sign Up</button>
      </form>
    </div>
  </div>
</body>

</html>