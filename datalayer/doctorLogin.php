<?php
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $mysqli -> real_escape_string($_POST['username']);
    $password = $mysqli -> real_escape_string($_POST['password']);
    if (empty($username)) {
    array_push($errors,"Username is required");
    # code...
    }
    if (empty($password)) {
    array_push($errors,"Password is required");

        # code...
    }


    if(!empty($password) && !empty($username)){
        $password=md5($password);
        
        $query="SELECT * FROM doctor WHERE username='$username' AND password='$password' AND Status LIKE '%Active%'";
        //echo $query;die;
        $result=mysqli_query($mysqli,$query);
        if (mysqli_num_rows($result) ==1 )  {
         //print_r($_SESSION['username']);die;
            $_SESSION['username']=$username;
            echo "<script>alert('You are now logged in!!');";
            echo "window.location.href = '../applicationlayer/doctor/homedoctor.php'</script>";

        }  
        else{
            echo "<script>alert('The ID/Password not correct!!');";
            echo "window.location.href = '../applicationlayer/login1.php'</script>";
            array_push($errors,"The ID/Password not correct");
        }
    }
    
}
?>
