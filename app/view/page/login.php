<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="asset/favicon.ico">
  <title>Login | Camagru</title>
  <link rel="stylesheet" href="style/global.css">
  <link rel="stylesheet" href="style/layout.css">
  <link rel="stylesheet" href="style/login.css">
</head>
<body>
  <?php include 'view/components/header.php'; ?>
  <div class="body__container">
    <form class="form" action="/api/login" method="POST">
      <div class="form__input">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>
      </div>
      <div class="form__input">
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <p>Forgot password?</p>
  </div>
  <?php include 'view/components/footer.php' ?>
</body>
</html>