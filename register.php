<?php
  session_start();
  include("config.php");
  include("sql_queries.php");
?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($db, $_POST["username"]);
      $password = mysqli_real_escape_string($db, $_POST["password"]);
      $phone = mysqli_real_escape_string($db, $_POST["password"]);
      $email = mysqli_real_escape_string($db, $_POST["password2"]);


      $sql_get_user_id = "SELECT id FROM Users where Username = '$username'";
      $result = mysqli_query($db, $sql_get_user_id);

      // $row = mysqli_fetch_array($users_list, MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if ($count == 1) {
          $error = 'Пользователь с таким логином уже существует';
      } elseif ($_POST["password"] != $_POST["password2"]) {
          $error = 'Пароли не совпадают';
      } elseif (strlen($_POST["password"]) < 8) {
          $error = 'Пароль должен иметь как минимум 8 символов';
      } elseif (strpos($_POST["email"], '@') == false) {
          $error = 'Неправильная электронная почта';
      } else {
          $sql_create_user = "INSERT INTO test.Users (Username, Password, LastName, FirstName, DateOfBirth, PhoneNumber) 
                  VALUES (". "'" . $_POST['username'] . "', '"
                            . $_POST["password"] . "', '"
                            . $_POST["last_name"] . "', '"
                            . $_POST["first_name"] . "', '"
                            . $_POST["bday"] . "', '"
                            . $_POST["phone"] . "')";
         
          $result = mysqli_query($db, $sql_create_user);
          $user_id = mysqli_insert_id($db);
          if ($user_id) {
              $_SESSION['username'] = $username;
              $_SESSION['user_id'] = $user_id;
              header('location: feed/main.php');
          } else {
              $error = 'Попробуйте позже';
          }
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
              <input type="text" class="form-control <?php echo $error ? 'is-invalid':''?>" id="username" placeholder="Логин..." name="username" require>
            </div>
            <div class="form-group">
              <input type="email" class="form-control <?php echo $error ? 'is-invalid':''?>" placeholder="Электронная почта..." name="email" require>
            </div>
            <div class="form-group">
              <input type="text" class="form-control <?php echo $error ? 'is-invalid':''?>"  placeholder="Имя..." name="first_name" require>
            </div>
            <div class="form-group">
              <input type="text" class="form-control <?php echo $error ? 'is-invalid':''?>" placeholder="Фамилия..." name="last_name" require>
            </div>
            <div class="form-group">
              <input type="text" class="form-control <?php echo $error ? 'is-invalid':''?>" placeholder="Номер телефона..." name="phone" require>
            </div>
            <div class="form-group">
              <input type="password" class="form-control <?php echo $error ? 'is-invalid':''?>" placeholder="Пароль..." name="password" require>
            </div>
            <div class="form-group">
              <input type="password" class="form-control <?php echo $error ? 'is-invalid':''?>"  placeholder="Повторите пароль..." name="password2" require>
            </div>
            <p>Дата рождения: <input type="text" id="datepicker" name="bday" placeholder="Выбрать дату"></p>
            
            <div class="col-lg-12">
              <small id="passwordHelp" class="text-danger">
                <?php echo $error; ?>
              </small>
            </div>
            <div style = "font-size:11px; color:#cc0000;"></div>
           
            <button type="submit" class="btn btn-success" style="">Зарегистрироваться</button>
            <div style="text-align: center; margin-top: 20px; margin-bottom: 100px;">
            <span >Уже есть аккаунт? <a href="login.php">Войти</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
    
  } );
  </script>
</html>
