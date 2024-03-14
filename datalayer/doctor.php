<?php
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $doctorId = $_POST['doctorId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $phone = $_POST['phone'];

    // Hash the password using password_hash
    $hashedPassword = md5($password);

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO doctor (doctorId, name, email, username, password, phone, Status) VALUES ('$doctorId', '$name', '$email', '$username', '$hashedPassword', '$phone', 'Active')";

    // Execute the statement
    $result=mysqli_query($mysqli,$sql);

    if($result==TRUE){
        echo "<script>window.alert('Successfully registered'); window.location.href='../applicationlayer/admin/doclist.php';</script>";
    } else {
        echo "<script>window.alert('Registration failed'); window.location.href='../applicationlayer/admin/register.php';</script>";
    }

}
?>
