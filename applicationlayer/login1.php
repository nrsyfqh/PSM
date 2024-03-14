<?php 
	include('../datalayer/server.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dental Clinic Appointment</title>

    <!-- <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->

    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link rel="stylesheet" href="loginStyle.css">
</head>

    <body>
        <form method="post" action="../datalayer/doctorLogin.php">
            <div class="wrapper">
                <div class="login_box">
                    <div class="login-header">
                        <span>Login Doctor</span>
                    </div>

                    <div class="input_box">
                        <input type="text" id="username" name="username" class="input-field" required>
                        <label for="username"  class="label">"Username"</label>
                        <i class="bx bx-user icon"></i>
                    </div>

                    <div class="input_box">
                        <div class="input-container">
                            <input type="password" id="password" name="password" class="input-field" required>
                            <label for="password"  class="label">"Password"</label>
                        </div>
                        <i class="bx bx-show icon" id = "toggle" aria-hidden="true" onclick = "togglePassword()"></i> 
                    </div>

                    <div class="input_box">
                        <input type="submit" class="input-submit" value="Login">
                    </div>
                    <div class="input_box">
                        <input type="button" onclick="window.location.href = '../presentationlayer/index.php';" class="input-submit" value="Back">
                    </div>
                </div>
            </div>
        </form>

        <script>
					function togglePassword() {
						var passwordInput = document.getElementById("password");
						var toggleButton = document.querySelector("#toggle");

						if (passwordInput.type === "password") {
							passwordInput.type = "text";
							toggleButton.classList.remove("bx-show");
                			toggleButton.classList.add("bx-hide");
						} else {
							passwordInput.type = "password";
							toggleButton.classList.remove("bx-hide");
                			toggleButton.classList.add("bx-show");
						}
					}
				</script>
    </body>
</html>