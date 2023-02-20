<?php
include('../layout/conn.php');

if(isset($_POST['save'])){
    $allowed = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "");
    $filename = $_FILES['emp_photo']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
        move_uploaded_file($_FILES['emp_photo']['tmp_name'], '../img/'.$filename);
        if($filename == ""){
            $path = 'img/no_image.jpeg';
        }else{
            $path ='img/'.$filename;
        }
        $emp_name = $_POST['emp_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sex = $_POST['sex'];
        $dep_id = $_POST['dep_id'];
        $sch_id = $_POST['sch_id'];

        $insert = mysqli_query($conn, "INSERT INTO employee(`employee_name`, `phone`, `address`, `sex`, `department_id`, `schedule_id`, `photo`) VALUES('$emp_name', '$phone', '$address', '$sex', '$dep_id','$sch_id', '$path')");

        if($insert){
            echo '<script>alert("Insert Successfully")</script>';
            echo '<script>window.location.href ="../employee_list.php"</script>';
        }else{
            echo '<script>alert("Not Inserted")</script>';
            echo '<script>window.location.href ="../employee_list.php"</script>';
        }

    }else{
       echo '<script>alert("Not Allowed")</script>';
       echo '<script>window.location.href ="../employee_list.php"</script>';
    }
}

?>