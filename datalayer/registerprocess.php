<?php
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $confirm_password = $mysqli->real_escape_string($_POST['confirm_password']);

    if (empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($phone)) {
        array_push($errors, "All fields are required");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    } elseif ($password !== $confirm_password) {
        array_push($errors, "The two passwords do not match");
    } else {
        // Check if the username already exists in the database
        $check_query = "SELECT * FROM admin WHERE username = ?";
        $check_stmt = $mysqli->prepare($check_query);
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Username already exists. Please choose another username.');";
            echo "window.location.href = '../applicationlayer/register.php'</script>";
            exit();
        } else {
            // Hash the password using password_hash
            $hashed_password = md5($password);

            $insert_query = "INSERT INTO admin (adminId, username, password, email, phone, Status) VALUES (0, ?, ?, ?, ?, 'Active')";
            $insert_stmt = $mysqli->prepare($insert_query);
            $insert_stmt->bind_param("ssss", $username, $hashed_password, $email, $phone);

            if ($insert_stmt->execute()) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Registration successful";
                // header("Location: ../applicationlayer/login.php");
                echo "<script>alert('Register successful');";
                echo "window.location.href = '../applicationlayer/login.php'</script>";
                exit();
            } else {
                error_log("Error in registration: " . $mysqli->error);
                array_push($errors, "Information not correct");
                // header("Location: ../applicationlayer/register.php");
                echo "<script>alert('You are fail to register. Please try again..');";
                echo "window.location.href = '../applicationlayer/register.php'</script>";
                exit();
            }
        }
    }
}
?>
