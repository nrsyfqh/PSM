<?php

require ('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminId = $_SESSION["adminId"];
    $name = $_POST['name'];

    
    $sql = "INSERT INTO treatment (treatmentId, adminId, name, Status) VALUES (0, '$adminId', '$name', 'Active') ";
    $result = mysqli_query($mysqli, $sql);

    if ($result == TRUE) {
        echo "<script>window.alert('Successfully registered'); window.location.href='../applicationlayer/admin/treatmentlist.php';</script>";
    } else {
        echo "<script>window.alert('Registration fail!!'); window.location.href='../applicationlayer/admin/treatmentadd.php';</script>";
    }
}

?> 