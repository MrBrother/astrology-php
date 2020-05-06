<?php
  session_start();
  include("config.php");
  include("sql_queries.php");
?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($db, $_POST["username"]);
      $password = mysqli_real_escape_string($db, $_POST["password"]);
      $users_list = get_user_id($db, $_POST["username"], $_POST["password"]);

      // $row = mysqli_fetch_array($users_list, MYSQLI_ASSOC);
      $count = mysqli_num_rows($users_list);
      if ($count == 1) {
          $_SESSION['username'] = $username;
          while ($row = mysqli_fetch_assoc($users_list)) {
              $_SESSION['user_id'] = $row['id'];
          }
          header('location: feed/main.php');
      } else {
          $error = 'Неправильные данные';
      }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">
  <link rel="shortcut icon" href="img/favicon.png" />
  <link rel="stylesheet" href="css/style.css">
  <title>Вход | Cosmology.IO</title>
</head>
<body class="login">
  <div class="login">
    <h1>Astrology.IO</h1>
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-3">

          <form class="form-example" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control <?php echo $error ? 'is-invalid':''?>" id="username" placeholder="Логин..." name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control <?php echo $error ? 'is-invalid':''?>" id="password" placeholder="Пароль..." name="password">
            </div>
            <div class="col-lg-12">
              <small id="passwordHelp" class="text-danger">
                <?php echo $error; ?>
              </small>
            </div>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
            <button type="submit" class="btn btn-success">Вход</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
