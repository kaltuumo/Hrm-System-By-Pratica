<?php 

include('../layout/conn.php');


if(isset($_POST['update'])){
    $update_id  = $_POST['update_id'];
    // echo $update_id;
    $department = $_POST['department'];

    $update_qry = mysqli_query($conn, "UPDATE department SET department_name = '$department' WHERE department_id = '$update_id'");

    if($update_qry){
       echo '<script>alert("Updated Successfully")</script>';
       echo '<script>window.location.href ="../department_list.php";</script>';
    }else{
        echo '<script>alert("Not Updated")</script>';
        echo '<script>window.location.href ="../department_list.php";</script>';
    }
}

?>