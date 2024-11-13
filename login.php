<?php ob_start();
    session_start();
      /* DATABASE CONNECTION*/
      require "functions/db.php";

      $conn=$connection; 

      $email = $password = "";
      $email_err = $password_err = "";

      if($_SERVER["REQUEST_METHOD"] == "POST"){

          if(empty(trim($_POST["email"]))){
              $email_err = 'Hãy điền email.';
          } else{
              $email = trim($_POST["email"]);
          }

          if(empty(trim($_POST['password']))){
              $password_err = 'Hãy điền mật khẩu.';
          } else{
              $password = trim($_POST['password']);
          }

          if(empty($email_err) && empty($password_err)){
              $sql = "SELECT email, password FROM admin WHERE email = ?";
              if($stmt = mysqli_prepare($conn, $sql)){
                  mysqli_stmt_bind_param($stmt, "s", $param_email);
                  // Set parameters
                  $param_email = $email;
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
                      // Store result
                      mysqli_stmt_store_result($stmt);
                      // Check if email exists, if yes then verify password
                      if(mysqli_stmt_num_rows($stmt) == 1){
                          mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                          if(mysqli_stmt_fetch($stmt)){
                              if(password_verify($password, $hashed_password)){                                  
                                  $_SESSION['email'] = $email;

                                    header("Location: index.php");
                              } else{
                                  $password_err = 'Mật khẩu bạn của bạn không đúng. Xin hãy thử lại.';
                              }
                          }

                      } else{
                          $email_err = 'Không có tài khoản nào sử dụng email này. Vui lòng kiểm tra lại.';
                      }

                  } else{
                      echo "Có lỗi đã xảy ra. Xin hãy thử lại.";
                  }
              }
              mysqli_stmt_close($stmt);
          }
          mysqli_close($conn);
      }
      ?>

    <!--- LOGIN SCRIPT----->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/icon1.png">
    <title>Office renting website</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h3 class="box-title m-b-20 text-center font-weight-bold">KSE Xin chào!</h3>
                     <p style="color:red; " > <?php echo $email_err; ?> </p>
                <p style="color:red;">  <?php echo $password_err; ?> </p>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Ghi nhớ đăng nhập </label>
                            </div> 
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Quên mật khẩu?</a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Đăng Nhập</button>
                        </div>
                    </div>
                    
                   
                </form>
                  <form class="form-horizontal" id="recoverform" action="index.php">
                    <div class="form-group ">
                        <div class="col-xs-12 text-center">
                            <h3>Lấy lại mật khẩu</h3>
                            <p class="text-muted">Hãy điền email và hướng dẫn lấy lại mật khẩu sẽ được gửi tới cho bạn! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    <div class="form-group m-t-10">
                        <div class="col-xs-12">
                            <a href="login.php" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
