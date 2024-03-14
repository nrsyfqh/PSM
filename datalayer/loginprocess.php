<?php
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (!empty($password) && !empty($username)) {
        $password = md5($password);

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password' AND Status LIKE '%Active%'";
        $result = mysqli_query($mysqli, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            // Fetch the associative array representation of the result
            $row = mysqli_fetch_assoc($result);

            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['adminId'] = $row['adminId'];
            $_SESSION['success'] = "You are now logged in";

            // Redirect to the desired page
            echo "<script>alert('You are now logged in!!');";
            echo "window.location.href = '../applicationlayer/admin/home.php'</script>";
        } else {
            echo "<script>alert('The ID/Password not correct!!');";
            echo "window.location.href = '../applicationlayer/login.php'</script>";
            array_push($errors, "The ID/Password not correct");
        }
    }
}
?>
