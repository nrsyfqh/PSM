<?php 

require ('server.php');

    if (isset($_POST['treatUpdate'])) {
       
        $treatmentId= $_POST['treatmentId'];
        $name = $_POST['name'];


        $sql = "UPDATE treatment SET name ='$name' WHERE `treatmentId`='$treatmentId'"; 

        $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully update'); window.location.href='../applicationlayer/admin/treatmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Update fail!!');</script>";

        }

    } 

if (isset($_GET['treatmentId'])) {

    $treatmentId = $_GET['treatmentId']; 
    $sql = "SELECT treatmentId, name FROM treatment WHERE treatmentId = '$treatmentId'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $_POST['name'];

        } 
    }
}

?>