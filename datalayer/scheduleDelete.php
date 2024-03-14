<?php

require ('server.php');

if (isset($_GET['delete'])) {

    $scheduleId = $_GET['delete'];
    
    $sql = "UPDATE schedule SET avail = 'Unavailable' WHERE scheduleId = '$scheduleId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully deleted'); window.location.href='../applicationlayer/admin/schedulelist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        } 
}


if (isset($_GET['active'])) {

    $scheduleId = $_GET['active'];
    
    $sql = "UPDATE schedule SET avail = 'Available' WHERE scheduleId = '$scheduleId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully active'); window.location.href='../applicationlayer/admin/schedulelist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}

if (isset($_GET['deleteSch'])) {

    $scheduleId = $_GET['deleteSch'];
    
    $sql = "UPDATE schedule SET avail = 'Unavailable' WHERE scheduleId = '$scheduleId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully deleted'); window.location.href='../applicationlayer/doctor/schedule.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        } 
}


if (isset($_GET['activeSch'])) {

    $scheduleId = $_GET['activeSch'];
    
    $sql = "UPDATE schedule SET avail = 'Available' WHERE scheduleId = '$scheduleId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully active'); window.location.href='../applicationlayer/doctor/schedule.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}

?>