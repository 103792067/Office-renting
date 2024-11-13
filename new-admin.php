<?php 

    ob_start();
    require_once "functions/db.php";

    // If session variable is not set it will redirect to login page
    session_start();

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

     if (is_logged_in_temporary()) {
        //allow access

    $email = $_SESSION['email'];


    /*******************************************************
                    introduce the admin header
    *******************************************************/
    require "admin_header0.php";


    /*******************************************************
                    Add the left panel
    *******************************************************/
    require "admin_left_panel.php";

    ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php echo $username;?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Admin</a></li>
                            <li class="active">Thêm</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Tạo admin</h3>
                            <p class="text-muted m-b-30 font-13"> Hãy điền thông tin phía dưới </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form action="functions/new_admin.php" method="post">
                                        <!-- <div class="form-group">
                                            <label for="exampleInputuname">User Name</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                                <input type="text" class="form-control" id="exampleInputuname" placeholder="Username"> </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="uname">Tên người dùng</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                                <input type="text" name="uname" class="form-control" id="uname" placeholder="e.g Nguyễn Văn A" required=""> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-email"></i></div>
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="example@gmail.com" required=""> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Quyền admin</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-institution"></i></div>
                                                <select name="role" class="form-control" id="role" required="">
                                                    <option value="">**Chọn quyền admin**</option>
                                                    <option value="level-0">Cấp độ 0</option>
                                                    <option value="level-1">Cấp độ 1</option>
                                                    <option value="level-2">Cấp độ 2</option>
                                                    <option value="level-3">Cấp độ 3</option>
                                                </select>
                                                 </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputpwd1">Mật khẩu</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="password" name="password" id="Password" class="form-control" id="exampleInputpwd1" placeholder="Hãy điền mật khẩu" required=""> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputpwd2">Xác nhận mật khẩu</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="password" name="password2" id="ConfirmPassword" class="form-control" id="exampleInputpwd2" placeholder="Hãy xác nhận mật khẩu" required=""> </div>
                                                <div id="msg" style="padding-left: 10px;"></div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Thêm admin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
           

                </div>
                <!--./row-->
            
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2024 &copy; Tạo Admin </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    <script src="js/jasny-bootstrap.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- CHECK IF PASSWORDS MATCH -->
        <script>
                $(document).ready(function(){
                    $("#ConfirmPassword").keyup(function(){
                         if ($("#Password").val() != $("#ConfirmPassword").val()) {
                             $("#msg").html("Password do not match").css("color","red");
                         }else{
                             $("#msg").html("Password matched").css("color","green");
                        }
                  });
            });
            </script> 
    <!--END CHECK IF PASSWORDS MATCH -->

</body>

</html>
<?php
}
else{
    header('location:../index.php');
}
?>
