<?php 

require ('server.php');

    if (isset($_POST['appUpdate'])) {
       
        $appointmentId = $_POST['appointmentId'];
        $patientId = $_POST['patientId'];
        $treatment = $_POST['treatment'];

    // Assuming 'appointment' is the name of your table
    $sql= "UPDATE appointment 
                  SET treatmentId = '$treatment',
                  patientId = '$patientId'
                  WHERE appointmentId = '$appointmentId'";

    $result=mysqli_query($mysqli,$sql);
    
        if($result==TRUE){
            echo "<script>window.alert('Successfully update'); window.location.href='../applicationlayer/admin/appointmentlist.php';</script>";
           
        }else{
            echo "<script>window.alert('Update fail!!');</script>";

        }

    } 


    if (isset($_POST['appDocUpdate'])) {
       
        $appointmentId = $_POST['appointmentId'];
        $description = $_POST['description'];

    // Assuming 'schedule' is the name of your table
    $sql= "UPDATE appointment
                  SET description = '$description', status = 'Completed'
                  WHERE appointmentId = '$appointmentId'";

    $result=mysqli_query($mysqli,$sql);
    
        if($result==TRUE){
            echo "<script>window.alert('Successfully update'); window.location.href='../applicationlayer/doctor/appointment.php';</script>";
           
        }else{
            echo "<script>window.alert('Update fail!!');</script>";

        }

    } 

if (isset($_GET['appointmentId'])) {

    $appointmentId = $_GET['appointmentId']; 
    $sql = "SELECT scheduleId, patientId, treatmentId FROM appointment WHERE appointmentId = '$appointmentId'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $patientId= $_POST['patientId'];
            $treatment = $_POST['name'];

        } 
    }
}

?>