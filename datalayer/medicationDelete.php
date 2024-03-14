<?php

require ('server.php');

if (isset($_GET['delete'])) {

    $medicationId = $_GET['delete'];
    
    $sql = "UPDATE medication SET Status = 'Inactive' WHERE medicationId = '$medicationId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully deleted'); window.location.href='../applicationlayer/admin/mediclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}


if (isset($_GET['active'])) {

    $medicationId = $_GET['active'];
    
    $sql = "UPDATE medication SET Status = 'Active' WHERE medicationId = '$medicationId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully active'); window.location.href='../applicationlayer/admin/mediclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}

?>