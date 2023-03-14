<?php

include('../layout/conn.php');

if(isset($_POST['save'])){
    $emp_id = $_POST['emp_id'];
    $time_in = date('h:i:s A', strtotime ($_POST['time_in']));
    $date = $_POST['date'];
    $month = date('M');

    $check_qry = mysqli_query($conn, "SELECT employee_id, s.time_in FROM `employee` e
    INNER JOIN schedule s ON s.schedule_id = e.schedule_id WHERE employee_id = '$emp_id'");

    if($check_qry->num_rows > 0){

        foreach($check_qry as $row){
            // echo $row['employee_id'];

            $t_in = $row['time_in'];

            if($time_in == $t_in){
                $status = 1;
            }else{
                $status = 0;
            }
            // echo $status;

            $insert_attend = mysqli_query($conn, "INSERT INTO `attendence`(`emp_id`, `date`, `monthly`, `status`, `time_in`) VALUES('$emp_id', '$date', '$month', '$status', '$time_in')");

            if($insert_attend){
                echo '<script>alert("Inserted Successfully")</script>';
                echo '<script>window.location.href="../attendence_list.php"</script>';
            }
            else{
                echo '<script>alert("Not Inserted ")</script>';
                echo '<script>window.location.href="../attendence_list.php"</script>';
        } 
        }
    }else{
        echo '<script>alert("Unknown This ID")</script>';
        // echo '<script>window.location.href="../department_list.php"</script>';
    }
}

?>