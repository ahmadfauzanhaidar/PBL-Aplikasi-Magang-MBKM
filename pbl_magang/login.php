<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
  <title>Login Page</title>
</head>
<body>

  <div class="container">
    <div class="login-form">
      <img src="img/mbkm-137-648936574d498a69ea63bed2-removebg-preview.png" alt="Logo" class="logo" width="30%">
      <img src="img/1200px-Logo_Universitas_Brawijaya.svg.png" alt="Logo" class="logo" width="10%">
      <img src="img/1696863312_rebranding-vokasi-logo-04.png" alt="Logo" class="logo" width="20%">
      <h1>Login</h1>
      <form action="proses_login.php" method="POST">
        <!-- <label for="username">Username:</label> -->
        <input type="text" id="username" name="username" placeholder="Username" required>
        <!-- <label for="password">Password:</label> -->
        <input type="password" id="password" name="password" placeholder="Password" required>

        <input type="submit" value="Login">
      </form>
    </div>
  </div>
</body>
</html>
