 <!-- Left navbar-header on the dashboard-->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Tìm kiếm..."> <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span> 
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu"> <?php echo $username; ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="settings.php"><i class="ti-settings"></i> Cài đặt tài khoản</a></li>
                            <li><a href="functions/logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10"> ---Menu chính</li>
                    <li> <a href="index.php" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a>
                    </li>
                   
                     <li class="nav-small-cap">---Quản lí</li>

                    <li> <a href="#" class="waves-effect"><i class="fa fa-cogs fa-2x"></i> <span class="hide-menu">Quản lí Admin<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="admins.php">Quản lí tài khoản</a></li>
                            <li><a href="new-admin.php">Tạo Admin</a></li>
                            
                        </ul>
                    </li>

                    <li><a href="#" class="waves-effect"><i class="fa fa-users fa-2x"></i> <span class="hide-menu">Quản lí người dùng<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="users.php">Quản lí tài khoản</a></li>
                            <li><a href="new-user.php">Tạo người dùng</a></li>
                            
                        </ul>
                    </li>

                    <li><a href="#" class="waves-effect"><i class="fa fa-building fa-2x"></i> <span class="hide-menu">Văn phòng<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="admins.php">Thêm văn phòng</a></li>
                            <li><a href="admins.php"> Xem thông tin văn phòng</a></li>
                        </ul>
                    </li>

                    <li><a href="#" class="waves-effect"><i class="fa fa-credit-card fa-2x"></i> <span class="hide-menu">Hợp đồng <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="admins.php">Thêm hợp đồng</a></li>
                            <li><a href="admins.php">Xem thông tin hợp đồng</a></li>
                            
                        </ul>
                    </li>
                    
                    <li><a href="functions/logout.php" class="waves-effect"><i class="fa fa-sign-out fa-2x"></i> <span class="hide-menu">Đăng xuất</span></a></li>
                   
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->