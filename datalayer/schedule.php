<?php

require ('server.php');

// Check if the form has been submitted using the POST method
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Retrieve form data
    $doctorId = $_POST['doctorId'];
    $date = $_POST['date'];
    $day = $_POST['dayDisplay'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    // Function to check if the schedule is unique
    function isScheduleUnique($mysqli, $doctorId, $date, $startTime, $endTime)
    {
        // Use prepared statements to prevent SQL injection
        $checkQuery = "SELECT * FROM schedule WHERE doctorId = ? AND date = ? AND startTime = ? AND endTime = ?";
        $stmt = mysqli_prepare($mysqli, $checkQuery);
        mysqli_stmt_bind_param($stmt, "isss", $doctorId, $date, $startTime, $endTime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rows = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);

         // If there are no rows, the schedule is unique
        return $rows == 0;
    }

    // Check if the schedule already exists
    if (!isScheduleUnique($mysqli, $doctorId, $date, $startTime, $endTime)) {
        echo "<script>window.alert('This schedule already exists for the selected doctor.'); window.location.href='../applicationlayer/admin/schedulelist.php';</script>";
        exit();
    }

    // Insert the schedule into the database
    $sql = "INSERT INTO schedule (scheduleId, doctorId, date, day, startTime, endTime, avail) VALUES (0,'$doctorId','$date','$day', '$startTime', '$endTime', 'Available') ";
    
    $result=mysqli_query($mysqli,$sql);

    // Display success or failure message based on the query result
    if($result==TRUE){
        echo "<script>window.alert('Successfully registered'); window.location.href='../applicationlayer/admin/schedulelist.php';</script>";
    } else {
        echo "<script>window.alert('Registration fail!!'); window.location.href='../applicationlayer/admin/schedulelist.php';</script>";
    }  
}
?>