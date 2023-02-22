<?php 
include('../layout/conn.php');

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    // echo $delete_id;
    $delete_qry = mysqli_query($conn, "DELETE FROM employee WHERE employee_id = '$delete_id'");
    if($delete_qry){
        echo '<script>alert("Delete Successfully")</script>';
        echo '<script>window.location.href ="../employee_list.php"</script>';
    }else{
        echo '<script>alert("Not Delete")</script>';
        echo '<script>window.location.href ="../employee_list.php"</script>';
    }
    
}

?>