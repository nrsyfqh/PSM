<?php 

require ('server.php');

    if (isset($_POST['updatedata'])) {
       
        $doctorId= $_POST['doctorId'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone']; 


        $sql = "UPDATE doctor SET name ='$name', email ='$email', phone ='$phone' WHERE `doctorId`='$doctorId'"; 

        $result=mysqli_query($mysqli,$sql);

        if($result==TRUE){
            echo "<script>window.alert('Successfully update'); window.location.href='../applicationlayer/admin/doclist.php';</script>";
           
        }else{
            echo "<script>window.alert('Update fail!!');</script>";

        }

    } 

if (isset($_GET['doctorId'])) {

    $user_id = $_GET['doctorId']; 
    $sql = "SELECT name, email, phone FROM doctor WHERE doctorId = '$doctorId'";

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