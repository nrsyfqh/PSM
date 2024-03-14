<?php

require ('server.php');

if (isset($_GET['cancel'])) {

    $appointmentId = $_GET['cancel'];
    
    $sql = "UPDATE appointment SET status = 'Canceled' WHERE appointmentId = '$appointmentId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully canceled'); window.location.href='../applicationlayer/admin/appointmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Cancel fail!!');</script>";

        }
    
}

if (isset($_GET['confirm'])) {

    $appointmentId = $_GET['confirm'];
    
    $sql = "UPDATE appointment SET status = 'Confirmed' WHERE appointmentId = '$appointmentId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully confirm'); window.location.href='../applicationlayer/admin/appointmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Confirm fail!!');</script>";

        }
    
}

if (isset($_GET['cancelhome'])) {

    $appointmentId = $_GET['cancelhome'];
    
    $sql = "UPDATE appointment SET status = 'Canceled' WHERE appointmentId = '$appointmentId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully canceled'); window.location.href='../applicationlayer/admin/home.php';</script>";
           
        }else{
            echo "<script>window.alert('Cancel fail!!');</script>";

        }
    
}

if (isset($_GET['confirmhome'])) {

    $appointmentId = $_GET['confirmhome'];
    
    $sql = "UPDATE appointment SET status = 'Confirmed' WHERE appointmentId = '$appointmentId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully confirm'); window.location.href='../applicationlayer/admin/home.php';</script>";
           
        }else{
            echo "<script>window.alert('Confirm fail!!');</script>";

        }
    
}

?>