<?php
include_once ''.$_SERVER['DOCUMENT_ROOT'].'/SecureBlog/database/db_connect.php';
include_once ''.$_SERVER['DOCUMENT_ROOT'].'/SecureBlog/config/secure_session.php'; 
sec_session_start();
$_SESSION['token'] = hash("SHA1", time());
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
    <title>Admin</title>
    <script type="text/JavaScript" src="../js/vendor/jquery-1.11.1.js"></script> 
    <script type="text/JavaScript" src="../js/sha512.js"></script> 
    <script type="text/JavaScript" src="../js/login_form.js"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/admin-forms.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php 
    if(isset($_GET['error']) && $_GET['error'] == 1)
    {
    ?>
      <div class="alert-warning"><label>Wrong e-mail or password entered, please try again!</label></div>
    <?php 
    }
    ?>
    
    <div class="container">

        <form class="form-signin" role="form" action="functions/login.php" method="post">
            <h2 class="form-signin-heading" style="color:#777">Please sign in</h2>
        <label for="mail" class="sr-only">Email address</label>
        <input type="email" id="mail" class="form-control" name="mail" placeholder="Email address" required autofocus>
        <br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>
        <input type='hidden' id='token' name='token' value='<?php echo $_SESSION['token']; ?>'>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login" onclick="formhash(this.form, this.form.password, this.form.token);" />
        </form>
       
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  
  
</html>
