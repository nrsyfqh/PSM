<?php

require ('server.php');

if (isset($_GET['delete'])) {

    $doctorId = $_GET['delete'];
    
    $sql = "UPDATE doctor SET Status = 'Inactive' WHERE doctorId = '$doctorId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully deleted'); window.location.href='../applicationlayer/admin/doclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}
if (isset($_GET['active'])) {

    $doctorId = $_GET['active'];
    
    $sql = "UPDATE doctor SET Status = 'Active' WHERE doctorId = '$doctorId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully active'); window.location.href='../applicationlayer/admin/doclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}
?>