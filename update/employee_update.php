<?php
include('../layout/conn.php');

if(isset($_POST['update'])){
    $old_photo = $_POST['old_photo'];
    $allowed = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "");
    $filename = $_FILES['emp_photo']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
        move_uploaded_file($_FILES['emp_photo']['tmp_name'], '../img/'.$filename);
        if($filename == ""){
            $path = $old_photo;
        }else{
            $path ='img/'.$filename;
        }
        $update_id = $_POST['update_id'];
        $emp_name = $_POST['emp_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sex = $_POST['sex'];
        $dep_id = $_POST['dep_id'];
        $sch_id = $_POST['sch_id'];
        $update_date =date('Y-m-d h:i:s A');

        $update_qry = mysqli_query($conn, "UPDATE employee SET `employee_name`='$emp_name',`phone`='$phone',`address`='$address',`sex`='$sex',`department_id`='$dep_id',`schedule_id`='$sch_id',`photo`='$path',`updated_at`='$update_date' WHERE employee_id = '$update_id'");
        if($update_qry){
            echo '<script>alert("Updated Successfully.......")</script>';
            echo '<script>window.location.href="../employee_list.php"</script>';
        }else{
            echo '<script>alert("Not Updated")</script>';
        echo '<script>window.location.href="../employee_list.php"</script>';
        }
    }
        

    }else{
       echo '<script>alert("Not Allowed")</script>';
       echo '<script>window.location.href ="../employee_list.php"</script>';
    }


?>