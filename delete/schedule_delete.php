<?php 

include('../layout/conn.php');

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    // echo $delete_id;
    $delete_qry = mysqli_query($conn, "DELETE FROM schedule WHERE schedule_id = '$delete_id'");

    if($delete_qry){
        echo '<script>alert("Deleted Successfully")</script>';
       echo '<script>window.location.href ="../schedule_list.php"</script>';
    }else{
        echo '<script>alert("Not Deleted ")</script>';
        echo '<script>window.location.href ="../schedule_list.php"</script>';
    }
}

?>