<?php include '../controllers/authController.php';

$uname=$_SESSION['username'];

?>

<?php
$img_id_before=$_GET['img_report_id'];
$tmp = explode('``', $img_id_before);

// echo ($img_id_before);
$img_id = $tmp[1];

$img_id_gd = $tmp[0];


$confirm_status=false;
$st_name = '';
$st_email = '';
$st_phone = '';
$st_latitude = '';
$st_longitude = '';
$patient_name_btn='';
$sql="SELECT `patient_name` FROM `find` WHERE `guardian_name`='$uname'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    $patient_name_btn = $row['patient_name'];
}
?>

<?php
$sql="UPDATE `find` SET `confirm_status`=1 WHERE `img_name`='$img_id_gd'";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportee Details</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../utils/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../utils/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../utils/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../utils/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../utils/dist/css/adminlte.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../utils/plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include '../utils/user_nav.php' ?>

        <?php include '../utils/user_side.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Reportee Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="http://localhost/Projects/AI/user_profile/home.php">Home</a></li>
                                <li class="breadcrumb-item active">Reportee Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?php


$sql="SELECT * FROM `report` WHERE `img_name`='$img_id'";
$result=mysqli_query($conn,$sql);
// echo '<pre>' . print_r($sql, TRUE) . '</pre>';
while($row = mysqli_fetch_array($result))
{
    $st_name = $row['suspected_missing'];
    $st_email = $row['email'];
    $st_phone = $row['phone'];
    $st_latitude = $row['Latitude'];
    $st_longitude = $row['Longitude'];
    send_confirm_mail_stranger($st_email);     
}



?>
            <?php
?>

            <!-- Input addon -->
            <div class="card card-info mx-4">
                <div class="card-header" style="background:#ff4583">
                    <h3 class="card-title"><?php echo $st_name?>'s Details</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <!-- <span class="input-group-text">@</span> -->
                            <i class="input-group-text fas fa-user"></i>
                        </div>
                        <input type="text" style="background:white;" class="form-control" value="<?php echo $st_name?>"
                            readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <i class="input-group-text fas fa-envelope"></i>
                        </div>
                        <input type="email" style="background:white" class="form-control" value="<?php echo $st_email?>"
                            readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <!-- <i class="input-group-text fas fa-phone" style="color:black"></i> -->
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>

                        </div>
                        <input type="text" style="background:white" class="form-control" value="<?php echo $st_phone?>"
                            readonly>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Map card -->
            <div class="card bg-white mx-4">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <?php echo $st_name?>'s location
                    </h3>
                    <!-- card tools -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm" data-card-widget="collapse" title="Collapse"
                            style="background: #ff4583; color: white">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <div class="card-body">
                    <!-- <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $st_latitude; ?>,<?php echo $st_longitude; ?>&output=embed"></iframe> -->
                    <iframe width="100%" height="500"
                        src="https://maps.google.com/maps?q=17.3970541004723,78.35642403229957&output=embed"></iframe>
                </div>
            </div>
            <!-- /.card -->
            <!-- <button><a href="delete.php?img_id_before=<?php echo $img_id_before?>">Confirm delete</a></button> -->
            <div class="col-md-12 d-flex flex-column my-3" style="margin:0 1rem; width: 97.5%">
                <a class="btn btn-lg delete text-white" href="delete.php?img_id_before=<?php echo $img_id_before?>"
                    style="background-color:#ff4583;">
                    <i class="fas fa-check-circle"></i>&nbsp;&nbsp;
                    Confirm <?php echo $patient_name_btn ?> has been found
                </a>
            </div>
        </div>




        <?php include '../utils/admin_footer.php' ?>

    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="../utils/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="../utils/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../utils/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../utils/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../utils/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../utils/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../utils/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../utils/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../utils/plugins/jszip/jszip.min.js"></script>
    <script src="../utils/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../utils/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../utils/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../utils/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../utils/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../utils/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../utils/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <!-- Toastr -->
    <script src="../utils/plugins/toastr/toastr.min.js"></script>
    <script src="../discussion/tags/src/bootstrap-tagsinput.js"></script>

    <script>
    $(function() {
        $("#users").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
    <script>
    $('document').ready(function() {
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ", e.target.parentNode.parentNode);
                tr = e.target.parentNode.parentNode;
                Question_title.value = tr.getElementsByTagName("td")[1].innerText;
                Question_Description.value = tr.getElementsByTagName("td")[2].innerText;
                Category_name.value = tr.getElementsByTagName("td")[4].innerText;

                Tags.value = tr.getElementsByTagName("td")[5].innerText;

                snoEdit.value = tr.getElementsByTagName("td")[0].id;
                // console.log(e.target.parentNode.parentNode);
                $('#modal-edit').modal('toggle');
            })
        })
    })
    </script>

    <script>
    $('document').ready(function() {
        edits = document.getElementsByClassName('delete');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode;
                snodelete.value = tr.getElementsByTagName("td")[0].innerText;
                $('#modal-delete').modal('toggle');
            })
        })
    })
    </script>
    <script>
    <?php if ($show_Alert_edit): ?>
    toastr.success('Question updated successfully');
    <?php endif ?>
    </script>
    <script>
    <?php if ($show_Alert_delete): ?>
    toastr.success('Question deleted successfully');
    <?php endif ?>
    </script>

    <script>
    toastr.success('A verification link has been sent to the stranger');
    </script>

</body>

</html>