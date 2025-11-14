<?php
session_start();
include "db/db_connect.php";

$error = '';

// Handle login form submission
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password_input = $_POST['password'];

    // Prepare SQL query
    $stmt = $conn->prepare("SELECT id, fullname, email, password, role FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // ✅ Check if password is hashed or plain (for backward compatibility)
        if (password_verify($password_input, $user['password']) || $password_input === $user['password']) {

            // Store session data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header("Location: system/systemdashboard.php");
            } else {
                header("Location: webcus.php");
            }
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not found!";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="csss/login.css">
    <link rel="icon" href="img/Logos.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <section class="login-section">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="card login-card shadow-lg">
                        <div class="row g-0">

                            <!-- Left image -->
                            <div class="col-md-6 d-none d-md-block">
                                <img src="img/log.jpg" alt="Login" class="img-fluid rounded-start login-img">
                            </div>

                            <!-- Right content -->
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="login-content w-100 text-center px-4">
                                    <h1 class="brand-title">PRINCESS TOUCH</h1>
                                    <h5 class="subtitle mb-3">Welcome Back!</h5>
                                    <p class="intro-text">
                                        Log in to access your account, track orders, and get personalized skincare tips.
                                        New here? Create an account to explore our latest products and exclusive offers.
                                    </p>

                                    <!-- Display error -->
                                    <?php if (!empty($error)): ?>
                                        <div style="color:red; margin-bottom:10px;"><?= $error ?></div>
                                    <?php endif; ?>

                                    <form action="login.php" method="POST">
                                        <div class="form-area text-start">
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control input-field" placeholder="Email" required>
                                            </div>

                                            <div class="mb-2 position-relative">
                                                <input type="password" name="password" id="password" class="form-control input-field"
                                                    placeholder="Password" required>
                                                <i class="fa-regular fa-eye toggle-eye" id="togglePassword"></i>
                                            </div>

                                            <a href="webcart.php" type="submit" name="login" class="btn btn-login w-100 py-2">Login</a>
                                        </div>

                                        <p class="mt-4 mb-1">
                                            Don't have an account?
                                            <a href="reg.php" class="login-link">Sign up</a>
                                        </p>

                                        <div class="divider my-4">or</div>

                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-social"><i class="fab fa-google me-2"></i> Google</button>
                                            <button class="btn btn-social"><i class="fab fa-facebook-f me-2"></i> Facebook</button>
                                        </div>

                                        <div class="footer-links mt-4 d-flex justify-content-center gap-3">
                                            <a href="ToS.php">Terms of Service</a>
                                            <a href="policy.php">Privacy Policy</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const togglePassword = document.getElementById("togglePassword");
            const password = document.getElementById("password");

            togglePassword.addEventListener("click", function() {
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                this.classList.toggle("fa-eye-slash");
            });
        </script>
    </section>
</body>

</html>