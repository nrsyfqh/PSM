<?php

require ('server.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $adminId = $_SESSION["adminId"];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $guideline = $_POST['guideline'];
   
    
    $sql = "INSERT INTO medication (medicationId, adminId, name, description, usageguideline, status) VALUES (0,'$adminId','$name','$description', '$guideline', 'Active') ";
    //print_r($sql);die;

    $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully registered'); window.location.href='../applicationlayer/admin/mediclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Registration fail!!'); window.location.href='../applicationlayer/admin/medicadd.php';</script>";

        }
    
}

?>