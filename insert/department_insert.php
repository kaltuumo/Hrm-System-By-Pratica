<?php
include('../layout/conn.php');

if(isset($_POST['save'])){
    $dep_name = $_POST['department'];
    echo $dep_name;
    $insert_qry = mysqli_query($conn, "INSERT INTO department(department_name) VALUES('$dep_name')");

    if($insert_qry){
        echo '<script>alert("Inserted Successfully")</script>';
        echo '<script>window.location.href="../department_list.php"</script>';
    }
    else{
        echo '<script>alert("Not Inserted ")</script>';
        echo '<script>window.location.href="../department_list.php"</script>';
} 
}


?>