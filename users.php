<?php
    $pgnm="Người dùng";
    $error=' ';

    //require the global file for errors
    require_once "functions/errors.php";
    
    ob_start();
    require_once "functions/db.php";

    // Initialize the session

    session_start();

    // If session variable is not set it will redirect to login page

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }
    if (is_logged_in_temporary()) {
        #allow access
    

    $email = $_SESSION['email'];

   /* $sql = "SELECT `tenantID`,`houseNumber`,`tenant_name`,`email`,`ID_number`,`profession`,`phone_number`,`dateAdmitted`,`agreement_file`, `house_name`,`number_of_rooms`,`house_status`,`rent_amount`,`houseID` FROM `tenants`LEFT join `houses` ON `tenants`.`houseNumber`=`houses`.`houseID`";
   */
   $sql="select * from `tenantsView`";

    $query = mysqli_query($connection, $sql);
    
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
                        <h4 class="page-title"> Chào mừng <?php echo $username;?>,</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li><a href="#" class="active">Người dùng</a></li>
                            <li><a href="new-user.php" class="btn btn-success btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Thêm người dùng</a></li>
                            
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                   
                    
                    <div class="col-sm-12">
                        <div class="white-box">

                        		<?php
                                echo $error;

                                if (isset($_GET["success"])) {
                                        echo 
                                        '<div class="alert alert-success" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>DONE!! </strong><p> Người dùng mới đã được thêm thành công.</p>
                                        </div>'
                                        ;
                                    }
                                    elseif (isset($_GET["deleted"])) {
                                        echo 
                                        '<div class="alert alert-warning" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>DELETED!! </strong><p> Người dùng đã được xóa thành công.</p>
                                        </div>'
                                        ;
                                    }
                                    elseif (isset($_GET["del_error"])) {
                                        echo 
                                        '<div class="alert alert-danger" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                             <strong>ERROR!! </strong><p> Đã xảy ra vấn đề. Xin vui lòng thử lại .</p>
                                        </div>'
                                        ;
                                    }
								?>	

                            <h3 class="box-title m-b-0">Danh sách người dùng ( <x style="color: orange;"><?php echo @mysqli_num_rows($query);?></x> )</h3>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">

                                    <?php 

                                    if (@mysqli_num_rows($query)==0) {
                                                    echo "<i style='color:brown;'>No Tenants to Display:( </i> ";
                                                }
                                                else{

                                                    echo '
                                                    <thead>
                                                    <tr>
                                                        <th>Tên</th>
                                                        <th>Căn hộ đang thuê</th>
                                                        <th>Email</th>
                                                        <th>Số ID</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Tiền thuê</th>
                                                        <th>Ngày đăng kí</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ';
                                                }

                                        while ($row = @mysqli_fetch_array($query)) {
                                            // $noOfRooms = $row["number_of_rooms"];
                                             //$hsStatus=$row['house_status'];

                                    echo '
                                    

                                        <tr>
                                            <td>'.$row["tenant_name"].'</td>
                                            <td>'.$row["house_name"].'</td>
                                            <td>'.$row["email"].'</td>
                                            <td>'.$row["ID_number"].'</td>               
                                            <td>'.$row["phone_number"].'</td>
                                            <td>'.$row["rent_amount"].'</td>
                                            <td>'.$row["dateAdmitted"].'</td>
                                            <td><a href="#"><i class="fa fa-trash"  data-toggle="modal" data-target="#responsive-modal'.$row["tenantID"].'" title="remove" style="color:red; margin-left: 45px; "></i></a></td>
                                       

                                            <!-- /.modal -->
                                            <div id="responsive-modal'.$row["tenantID"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Bạn có chắc muốn xóa người dùng này vĩnh viễn? '.$row["tenant_name"].'\'s record?</h4>
                                                            </div>
                                                        <div class="modal-footer">

                                                        <form action="functions/del_tenant.php" method="post">
                                                        <input type="hidden" name="tenID" value="'.
                                                        $row["tenantID"].'"/>
                                                        <input type="hidden" name="num" value="'.
                                                        $row["number_of_rooms"].'"/>
                                                        <input type="hidden" name="state" value="'.
                                                        $row["house_status"].'"/>
                                                        <input type="hidden" name="hsID" value="'.
                                                        $row["houseID"].'"/>
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Quay lại</button>
                                                            <button type="submit" name="deleteTenant" class="btn btn-danger waves-effect waves-light">Xóa</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <!-- End Modal -->

                                            <!-- Modal to edit. -->

                                         </tr>
                                    ';

                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>       
            <?php require "admin_footer.php"; ?>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
<?php
}
else{
    header('location:index.php');
}
?>