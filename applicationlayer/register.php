<?php
// Include the server-side logic for registration
include('../datalayer/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic Appointment</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <form method="post" action="../datalayer/registerprocess.php" onsubmit="return validateForm();">

        <div class="wrapper">
            <div class="login_box">
                <div class="login-header">
                    <span>Register</span>
                </div>

                <!-- Username Input -->
                <div class="input_box">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="input-field" required>
                    <i class="bx bx-user icon-register" id="usernameIcon"></i>
                    <span id="usernameError" style="color: red;"></span>
                </div>

                <!-- Password Input -->
                <div class="input_box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="input-field" required>
                    <i class="bx bx-show icon-register" id="toggle" aria-hidden="true" onclick="togglePassword('password', 'toggle')"></i>
                </div>

                <!-- Confirm Password Input -->
                <div class="input_box">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="input-field" required>
                    <i class="bx bx-show icon-register" id="toggleConfirm" aria-hidden="true" onclick="togglePassword('confirm_password', 'toggleConfirm')"></i>
                    <span id="passwordError" style="color: red;"></span>
                </div>

                <!-- Email Input -->
                <div class="input_box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="input-field" required>
                    <i class="bx bx-envelope icon-register"></i>
                    <span id="emailError" style="color: red;"></span>
                </div>

                <!-- Phone Input -->
                <div class="input_box">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" class="input-field" required>
                    <i class="bx bx-phone icon-register"></i>
                </div>

                <div class="input_box">
                    <input type="submit" name="register" class="input-submit" value="Register">
                </div>
                <div class="input_box">
                    <input type="button" onclick="window.location.href = '../applicationlayer/login.php';" class="input-submit" value="Back">
                </div>
            </div>
        </div>
    </form>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
                var emailInput = document.getElementById("email");
                var emailError = document.getElementById("emailError");

                emailInput.addEventListener("input", function () {
                    var email = emailInput.value.trim();
                    if (email === "") {
                        emailError.textContent = "Email is required";
                    } else if (!isValidEmail(email)) {
                        emailError.textContent = "Invalid email format";
                    } else if (!endsWithGmail(email)) {
                        emailError.textContent = "Email must be email address";
                    } else {
                        emailError.textContent = "";
                    }
                });

                function isValidEmail(email) {
                    // Use a simple regex for basic email format validation
                    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                }

                function endsWithGmail(email) {
                    // Check if the email ends with @gmail.com
                    return /.com$/i.test(email);
                }
            });
        </script>


    <script>
        // Password toggle function
        function togglePassword(inputId, toggleId) {
            var passwordInput = document.getElementById(inputId);
            var toggleButton = document.getElementById(toggleId);

            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
            toggleButton.classList.toggle("bx-show");
            toggleButton.classList.toggle("bx-hide");
        }

        // Client-side form validation
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var passwordError = document.getElementById("passwordError");

            if (password !== confirmPassword) {
                passwordError.textContent = "Passwords do not match";
                return false;
            }

            passwordError.textContent = "";
            return true;
        }
    </script>
</body>
</html>
