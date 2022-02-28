<?php include '../config/db.php';

?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INFO</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../utils/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../utils/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../utils/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../utils/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../utils/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../utils/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../utils/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../utils/plugins/summernote/summernote-bs4.min.css">

    <style>
    ._users {
        background-color: white;
        display: flex;
        justify-content: space-between;
        padding: 1rem;
    }

    ._users .icon {
        color: #ff4583;
    }

    ._users:hover {
        background-color: #ff4583;
        color: white;
    }

    ._users:hover .icon {
        color: white;
    }

    .ai {
        color: #ff4583;

    }

    ._users:hover .ai {
        color: #333;
    }

    .card-title {
    float: left;
    font-size: 1.2rem;
    font-weight: 500;
    margin: 0;
}

#symptoms{
  list-style: url('../img/2.png');
}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <!-- <img class="animation__shake" src="../utils/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
        </div>

        <?php include '../utils/user_nav.php' ?>

        <?php include '../utils/user_side.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">INFO</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">INFO</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php 
// $sql="SELECT * FROM `users` WHERE `verified`=1";
// $result = mysqli_query($conn, $sql);
// $user_count = mysqli_num_rows($result);

// $sql="SELECT * FROM `questions`";
// $result = mysqli_query($conn, $sql);
// $question_count = mysqli_num_rows($result);

// $sql="SELECT * FROM `tbl_comment`";
// $result = mysqli_query($conn, $sql);
// $answer_count = mysqli_num_rows($result);

// $sql="SELECT * FROM `categories`";
// $result = mysqli_query($conn, $sql);
// $cat_count = mysqli_num_rows($result);
?>

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-12">
                            <!-- small box -->
                            <div class="small-box _users">
                                <div class="inner">
                                    <h3>Welcome <?php echo $_SESSION['username']?>, to Reun<span class="ai">Ai</span>te
                                    </h3>
                                </div>
                                <div class="icon">
                                    <img src="../img/1.png" alt="ReunAite Logo" height=70px width=70px
                                        style="opacity: .8;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="col-md-14">
                        <div class="card card-outline card-primary" style="border-top: 3px solid #ff4583">
                            <div class="card-header">
                                <h2 class="card-title">Characterstics to identify an Alzheimer's patient</h2>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul id="symptoms">
                                    <li>People who seem to be confused.</li><br>
                                    <li>People who wander around the same place for a longer time without any motive.
                                    </li><br>
                                    <li>People who tend to have difficulty in balancing themselves, trip over while
                                        walking etc.</li><br>
                                    <li>People who tend to show an impulsive behavior.</li><br>
                                    <li>People who have difficulty in communicating words, expressing themselves.</li><br>
                                    <li>Aimless locomotion with a repetitive pattern such as lapping or pacing, hyperactivity, and excessive walking</li><br>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php include '../utils/admin_footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../utils/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../utils/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../utils/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../utils/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../utils/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../utils/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../utils/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../utils/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../utils/plugins/moment/moment.min.js"></script>
    <script src="../utils/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../utils/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../utils/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../utils/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../utils/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../utils/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../utils/dist/js/pages/dashboard.js"></script>
</body>

</html>