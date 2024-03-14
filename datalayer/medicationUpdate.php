<?php 

require ('server.php');

    if (isset($_POST['medicUpdate'])) {
       
        $medicationId= $_POST['medicationId'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $guideline = $_POST['guideline']; 


        $sql = "UPDATE medication SET name ='$name', description ='$description', usageguideline ='$guideline' WHERE `medicationId`='$medicationId'"; 

        $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully update'); window.location.href='../applicationlayer/admin/mediclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Update fail!!');</script>";

        }

    } 

if (isset($_GET['medicationId'])) {

    $medicationId = $_GET['medicationId']; 
    $sql = "SELECT medicationId, name, description, usageguideline FROM medication WHERE medicationId = '$medicationId'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $guideline = $_POST['guideline']; 

        } 
    }
}

?>