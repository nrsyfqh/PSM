<?php

require ('server.php');

if (isset($_GET['delete'])) {

    $patientId = $_GET['delete'];
    
    $sql = "UPDATE patient SET Status = 'Inactive' WHERE patientId = '$patientId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully deleted'); window.location.href='../applicationlayer/admin/patientlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}

if (isset($_GET['active'])) {

    $patientId = $_GET['active'];
    
    $sql = "UPDATE patient SET Status = 'Active' WHERE patientId = '$patientId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully active'); window.location.href='../applicationlayer/admin/patientlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}
?>