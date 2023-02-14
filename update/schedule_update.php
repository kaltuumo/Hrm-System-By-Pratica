<?php


include('../layout/conn.php');

if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];

    $update_query = mysqli_query($conn, "UPDATE schedule SET time_in = '$time_in', time_out = '$time_out' WHERE schedule_id = '$update_id'");
    if($update_query){
       echo '<script>alert("Updated Successfully")</script>';
       echo '<script>window.location.href ="../schedule_list.php"</script>';
    }else{
        echo '<script>alert("Not Updated ")</script>';
        echo '<script>window.location.href ="../schedule_list.php"</script>';
    }
}
?>