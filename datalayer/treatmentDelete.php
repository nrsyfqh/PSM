<?php

require ('server.php');

if (isset($_GET['delete'])) {

    $treatmentId = $_GET['delete'];
    
    $sql = "UPDATE treatment SET Status = 'Inactive' WHERE treatmentId = '$treatmentId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully deleted'); window.location.href='../applicationlayer/admin/treatmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}


if (isset($_GET['active'])) {

    $treatmentId = $_GET['active'];
    
    $sql = "UPDATE treatment SET Status = 'Active' WHERE treatmentId = '$treatmentId' ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully active'); window.location.href='../applicationlayer/admin/treatmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Delete fail!!');</script>";

        }
    
}

?>