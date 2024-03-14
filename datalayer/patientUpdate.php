<?php 

require ('server.php');

    if (isset($_POST['updatedata'])) {
       
        $patientId= $_POST['patientId'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone']; 


        $sql = "UPDATE patient SET name ='$name', email ='$email', phone ='$phone' WHERE `patientId`='$patientId'"; 

        $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully update'); window.location.href='../applicationlayer/admin/patientlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Update fail!!');</script>";

        }

    } 

if (isset($_GET['patientId'])) {

    $user_id = $_GET['patientId']; 
    $sql = "SELECT name, email, phone FROM patient WHERE patientId = '$patientId'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone']; 

        } 
    }
}

?>