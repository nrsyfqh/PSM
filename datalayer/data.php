<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$errors = array();

$mysqli = new mysqli("localhost", "root", "", "clinicappointment");

if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

$sql = "
    SELECT
        COUNT(patientId) AS patients,  -- Update alias from vi to patients
        DATE_FORMAT(date, '%Y-%m') AS dat
    FROM
        patient
    GROUP BY
        DATE_FORMAT(date, '%Y-%m')
    ORDER BY
        DATE_FORMAT(date, '%Y-%m') ASC;
";

$result = $mysqli->query($sql);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

$mysqli->close();

// Output results as JSON
header('Content-Type: application/json');
echo json_encode($rows);
?>
