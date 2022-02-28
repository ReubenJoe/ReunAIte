<?php include("config/db.php");?>

<?php
$guardian_arr=array();
if(isset($_POST["subject"]))
{

    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $array_img_names=explode(', ',$comment);
    foreach ($array_img_names as $img_name){
        $sql="SELECT `guardian_name` FROM `find` WHERE `img_name`='$img_name'";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result))
        {
            $guard_name=$row['guardian_name'];
            // array_push($guardian_arr, $row['guardian_name']);
            $query = "
            INSERT INTO comments(comment_subject, comment_text, `send_to`)
            VALUES ('$subject', '$img_name','$guard_name')
            ";
            mysqli_query($conn, $query);
        }


    }

}

?>
