<?php  
include('../layout/conn.php');

if(isset($_POST['save'])){
    $time_in = date('h:i:s A', strtotime ($_POST['time_in']));
    $time_out  = date('h:i:s A', strtotime ($_POST['time_out']));

    $insert_qry = mysqli_query($conn, "INSERT INTO schedule(`time_in`, `time_out`) VALUES('$time_in', '$time_out')");

    if($insert_qry){
        echo '<script>alert("Inserted Successfully");</script>';
        echo '<script>window.location.href ="../schedule_list.php";</script>';
    }else{
        echo '<script>alert("Not Inserted ");</script>';
        echo '<script>window.location.href ="../schedule_list.php";</script>';
    }
}

?>