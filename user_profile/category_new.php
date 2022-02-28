<?php include '../controllers/authController.php' ?>
<?php
$uname = $_SESSION['username'];
$directory = '../result/';
$only_fname= array_diff(scandir($directory), array('..', '.'));
$list = implode(', ',$only_fname);
// echo '<pre>' . print_r($list, TRUE) . '</pre>';
$num_guard = '';
// echo '<pre>' . print_r($only_fname, TRUE) . '</pre>';
$image_guardian='';
$confirm_status='';
$reportee_name_result_found=false;
$patient_names_result=array();
$result_report_pn_arr=array();
$result_reportee_names_arr=array();
$patient_names_result=array();
$file_contents='';
$a=0;
?>

<?php

$directory = '../missing images/';
$only_missing= array_diff(scandir($directory), array('..', '.'));
$list_missing = implode(', ',$only_missing);
$image_missing='';
?>

<?php
$myfile = fopen("../project/cosine.txt", "r") or die("Unable to open file!");
$file_contents = fread($myfile,filesize("../project/cosine.txt"));
$file_contents_arr = explode(' ',$file_contents);

fclose($myfile);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportee Info Page</title>

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

<style>
a.disabled {
    pointer-events: none;
    cursor: default;
}
</style>

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
                            <h1>Reportee Info Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="http://localhost/Projects/AI/user_profile/home.php">Home</a></li>
                                <li class="breadcrumb-item active">Reportee Info</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php 


foreach ($only_missing as $patient_name){
    $tmp = explode('_', $patient_name);
    $patient_name = $tmp[0];
    array_push($patient_names_result,$patient_name);
    // notify_guardian($email,$pname);

}


foreach ($patient_names_result as $pn){
    $sql="SELECT `suspected_missing` FROM `report` WHERE `suspected_missing`='$pn'";
    // print_r($sql);
    $result_report_patient_names=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result_report_patient_names)){
        $temp=$row['suspected_missing'];
        array_push($result_report_pn_arr,$temp);   
    }
}


foreach ($result_report_pn_arr as $sn){
    $sql="SELECT `Reported By` FROM `report` WHERE `suspected_missing`='$sn'";
    $result_reportee_names=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result_reportee_names)){
        $temp=$row['Reported By'];
        array_push($result_reportee_names_arr,$temp);
    }
}
// print_r($result_reportee_names_arr);
foreach ($result_reportee_names_arr as $rn){
    
    if ($rn==$uname){
        $reportee_name_result_found=true;
    }
}




?>
            <?php 
if($reportee_name_result_found==false):?>
            <div class="col-md-12">
                <div class="card card-outline card-primary" style="border-top: 3px solid #ff4583">
                    <div class="card-header">
                        <h3 class="card-title">You have not found any missing person. <strong>Keep Searching!</strong>
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <img src="../img/searching.png" class="img-fluid pad rounded" style="width: 100%">
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <?php else:?>
            <?php
$array_img_names=explode(', ',$list);
foreach ($only_missing as $img_missing){
    $image_missing=$img_missing;
}

// print_r($array_img_names);
?>

            <?php if($array_img_names[0]!=''): ?>
            <?php foreach ($array_img_names as $img_name):?>

            <?php 

$sql="SELECT `confirm_status` FROM `find` WHERE `img_name`='$img_name'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    $confirm_status=$row['confirm_status'];
}
?>

            <?php if(($confirm_status)==1):?>

            <?php $image_guardian=$img_name; 
            
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
                                        href="http://localhost/Projects/AI/user_profile/datatable_ans_thread.php?img_report_id=<?php echo $img_head?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>&nbsp;&nbsp;
                                        View Status
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->


            <?php elseif(($confirm_status)==0):?>
            <?php //notify_guardian($email,$pname) ?>
            <?php $image_guardian=$img_name; 
                $temp_patient_name=explode('_',$image_guardian);
                $temp_patient_name_gd=$temp_patient_name[0];
                $sql="SELECT `email` FROM `find` WHERE `patient_name`='$temp_patient_name_gd'";
                $result_email_temp=mysqli_query($conn,$sql);
                while ($row=mysqli_fetch_array($result_email_temp)){
                    $email_temp_gd=$row['email'];
                    notify_guardian($email_temp_gd,$temp_patient_name_gd);
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
                                    <a class="btn btn-lg edit mb-2 bg-secondary bg-gradient">
                                        <i class="fas fa-pencil-alt">
                                        </i>&nbsp;&nbsp;
                                        View Status
                                    </a>
                                    <div class="col-md-15 mt-1">
                                        <div class="card card-outline card-primary"
                                            style="border-top: 3px solid #ff4583">
                                            <div class="card-header">
                                                <h3 class="card-title">Wait for the guardian to confirm to View Status
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <?php endif?>
            <?php endforeach ?>
            <?php else: ?>
            <div class="col-md-12">
                <div class="card card-outline card-primary" style="border-top: 3px solid #ff4583">
                    <div class="card-header">
                        <h3 class="card-title">You have not found any missing person. <strong>Keep Searching!</strong>
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <img src="../img/searching.png" class="img-fluid pad rounded" style="width: 100%">
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <?php endif ?>
            <?php endif?>

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