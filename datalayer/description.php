<?php
require('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["appointmentId"])) {
    $appointmentId = $_POST["appointmentId"];

    // Fetch the description from the database based on the appointmentId
    $query = "SELECT description FROM appointment WHERE appointmentId = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $appointmentId);

    if ($stmt->execute()) {
        $stmt->bind_result($description);
        $stmt->fetch();

        // Return the description as JSON
        echo json_encode($description);

        $stmt->close();
        exit();
    }
}

// Return an empty string if no description is found
echo json_encode('');

?>