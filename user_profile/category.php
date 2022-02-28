<?php include '../controllers/authController.php' ?>
<?php
$uname = $_SESSION['username'];
$directory = '../result/';
$only_fname= array_diff(scandir($directory), array('..', '.'));
$list = implode(', ',$only_fname);
$num_guard = '';
$patient_names_result=array();
$guardian_names_result=array();
$image_guardian='';
$guardian_name_result_found=false;
$pat_name='';
$a=0;
?>
<?php
$myfile = fopen("../project/cosine.txt", "r") or die("Unable to open file!");
$file_contents = fread($myfile,filesize("../project/cosine.txt"));
$file_contents_arr = explode(' ',$file_contents);

fclose($myfile);
?>
<?php

$directory = '../missing images/';
$only_missing= array_diff(scandir($directory), array('..', '.'));
$list_missing = implode(', ',$only_missing);
$image_missing='';

?>
<?php

foreach ($only_fname as $patient_name){
    $tmp = explode('_', $patient_name);
    $patient_name = $tmp[0];
    array_push($patient_names_result,$patient_name);
}

foreach ($patient_names_result as $pn){
    $sql="SELECT `guardian_name` FROM `find` WHERE `patient_name`='$pn'";
    $result_guard_names=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result_guard_names)){
        $temp=$row['guardian_name'];
        array_push($guardian_names_result,$temp);
    }
}

foreach ($guardian_names_result as $gn){
    
    if ($gn==$uname){
        $guardian_name_result_found=true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardian Info Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../utils/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../utils/dist/css/adminlte.min.css">
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
                            <h1>Guardian Info Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="http://localhost/Projects/AI/user_profile/home.php">Home</a></li>
                                <li class="breadcrumb-item active">Guardian Info</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?php 
            $sql="SELECT * FROM `find` WHERE `guardian_name`='$uname'";
            
            $report_result=mysqli_query($conn,$sql);
            $num_report_result=mysqli_num_rows($report_result);?>

            <?php if($num_report_result==0): ?>

            <div class="col-md-12">
                <div class="card card-outline card-primary" style="border-top: 3px solid #ff4583">
                    <div class="card-header">
                        <h3 class="card-title">You have not lost anyone. <strong>Stay Happy!</strong></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <img src="../img/happy.jpg" class="img-fluid pad rounded" style="width: 100%">
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <?php else:?>
            <?php if(count($only_fname)!=0 && $guardian_name_result_found==true):?>
            <?php
    // echo '<pre>' . print_r($list, TRUE) . '</pre>';
    $array_img_names=explode(', ',$list);
    
    foreach ($array_img_names as $img_name){
        $sql="SELECT `img_name` FROM `find` WHERE `guardian_name`='$uname'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){

            // $img_g_db=$row['img_name'];
            // echo '<pre>' . print_r($img_g_db, TRUE) . '</pre>';
            if ($img_name==$row['img_name']){
                $image_guardian=$img_name;
            }
        }

    }
    foreach ($only_missing as $img_missing){
        $image_missing=$img_missing;
    }
?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <br><br>
                    <div class="card card-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top" src="../result/<?php echo $image_guardian?>" alt="#"
                                            height="400px" width="500px">

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top" src="../missing images/<?php echo $image_missing?>"
                                            alt="#" height="400px" width="500px">

                                    </div>
                                </div>
                                <?php 
                        $img_head=$image_guardian."``".$image_missing;
                         ?>
                                <div class="col-md-12 col-lg-6 col-xl-4 d-flex flex-column my-auto">

                                    <div class="mx-auto mb-4 lh-lg p-4"
                                        style="font-size: 2rem; border: 2px solid #ff4583; border-radius: 50%; font-weight: bold; background:#ff4583; color:white;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                        <?php if ($file_contents_arr[$a]!='')
                                        {
                                            
                                        echo (int)$file_contents_arr[$a],"%";
                                        $a++;
                                        }
                                        ?>
                                    </div>
                                    <a class="btn btn-info btn-lg edit mb-2"
                                        href="http://localhost/Projects/AI/user_profile/datatable_que_thread.php?img_report_id=<?php echo $img_head?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>&nbsp;&nbsp;
                                        Confirm
                                    </a>

                                    <a class="btn btn-danger btn-lg delete" href="delete_guardian.php?img_guardian=<?php echo $image_guardian ?>">
                                        <i class="fas fa-trash">
                                        </i>&nbsp;&nbsp;
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <?php else: ?>
                <?php

                $sql="SELECT `patient_name` FROM `find` WHERE `guardian_name`='$uname'";
                $result_pat=mysqli_query($conn,$sql);
                while ($row=mysqli_fetch_array($result_pat)){
                    $pat_name=$row['patient_name'];
                }
                ?>
            <div class="col-md-12">
                <div class="card card-outline card-primary" style="border-top: 3px solid #ff4583">
                    <div class="card-header">
                        <h3 class="card-title">We haven't found <?php echo $pat_name?> yet. <strong>Don't Lose Hope!</strong></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    <img src="../img/hope.jpg" class="img-fluid pad rounded" style="width: 100%">
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <?php endif ?>
            <?php endif ?>
            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>

        <!-- /.content-wrapper -->

        <?php include '../utils/admin_footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../utils/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="../utils/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../utils/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../utils/dist/js/demo.js"></script>
</body>

</html>