<?php 

include_once ('server.php');

if (isset($_POST['schUpdate'])) {
       
    $scheduleId= $_POST['scheduleId'];
    $doctorId = $_POST['doctor'];
    $date = $_POST['currentdate'];
    $day = $_POST['currentday'];
    $startTime = $_POST['currentstartTime'];
    $endTime = $_POST['currentendTime'];


    $sql = "UPDATE schedule SET doctorId = '$doctorId', date ='$date', day ='$day', startTime ='$startTime', endTime ='$endTime' WHERE scheduleId='$scheduleId'"; 

    $result=mysqli_query($mysqli,$sql);

    if($result==TRUE){
        echo "<script>window.alert('Successfully updated!'); window.location.href='../applicationlayer/admin/schedulelist.php';</script>";
       
    }else{
        echo "<script>window.alert('Update fail!!');</script>";

    }

} 

if (isset($_POST['schDocUpdate'])) {
       
    $scheduleId= $_POST['scheduleId'];
    $date = $_POST['currentdate'];
    $day = $_POST['currentday'];
    $startTime = $_POST['currentstartTime'];
    $endTime = $_POST['currentendTime'];


    $sql = "UPDATE schedule SET date ='$date', day ='$day', startTime ='$startTime', endTime ='$endTime' WHERE scheduleId='$scheduleId'"; 

    $result=mysqli_query($mysqli,$sql);

    if($result==TRUE){
        echo "<script>window.alert('Successfully updated!'); window.location.href='../applicationlayer/doctor/schedule.php';</script>";
       
    }else{
        echo "<script>window.alert('Update fail!!');</script>";

    }

} 

if (isset($_GET['scheduleId'])) {

    $scheduleId = $_GET['scheduleId']; 
    $sql = "SELECT date, day, startTime, endTime  FROM schedule WHERE `scheduleId`='$scheduleId'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $_POST['name'];

        } 
    }
}

?>