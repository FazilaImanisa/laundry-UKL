<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login 2.0</title>
    <link rel="stylesheet" href="css/login.css">

</head>
<body class="align">

  <div class="grid">

    <form action="process-login.php" method="post" class="login">

      <header class="login__header">
        <h3 class="login__title">Login User</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="form__field">
          <input type="password" name="password" placeholder="Password" required>
        </div>

      </div>

      <footer class="login__footer">
        <input name = "login" type="submit" value="Login">

        <p><span class="icon icon--info">?</span><a href="process-login.php">Forgot Password</a></p>
      </footer>

    </form>

  </div>

</body>
</html>