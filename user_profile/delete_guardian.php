<?php
include '../controllers/authController.php';
?>
<?php

$img_gd=$_GET['img_guardian'];

unlink('../result/'.$img_gd.'');
header('location: http://localhost/Projects/AI/user_profile/category.php');
// include '../controllers/authController.php';
// $img_id_before=$_GET['img_id_before'];
// $tmp = explode('``', $img_id_before);

// $img_id_gd = $tmp[0];
// $img_id_report=$tmp[1];

// unlink('../result/'.$img_id_gd.'');
// unlink('../missing images/'.$img_id_report.'');
// unlink('../training_faces/'.$img_id_gd.'');

// $sql="DELETE FROM `find` WHERE `img_name`='$img_id_gd'";
// $result=mysqli_query($conn,$sql);

// $sql="DELETE FROM `report` WHERE `img_name`='$img_id_report'";
// $result=mysqli_query($conn,$sql);


// header('location: http://localhost/Projects/AI/user_profile/category.php');
?>