<?php

require ('server.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $doctorId = $_POST['doctor'];
    $scheduleId = $_POST['selected-schedule-id'];
    $patientId = $_POST['patient'];
    $treatmentId = $_POST['treatment'];
   
    $sql = "INSERT INTO appointment (appointmentId, doctorId, patientId, scheduleId, treatmentId, description, status) 
    VALUES (0,'$doctorId', '$patientId', '$scheduleId', '$treatmentId', '', 'Confirmed') ";

    $sqlUpdate = "UPDATE schedule SET avail = 'Unavailable' WHERE scheduleId = '$scheduleId'";

    //print_r($sql);die;

    $result = mysqli_query($mysqli,$sql);
    $result2 = mysqli_query($mysqli, $sqlUpdate);

        if($result==TRUE && $result2 == TRUE){
            echo "<script>window.alert('Successfully registered'); window.location.href='../applicationlayer/admin/appointmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Registration fail!!'); window.location.href='../applicationlayer/admin/appointmentlist.php';</script>";

        }
    
}

?>