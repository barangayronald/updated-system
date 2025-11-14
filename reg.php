<?php
session_start();
include("db/db_connect.php");

$error = '';
$success = '';

if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email is already registered!";
        } else {
            // Hash the password
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $insert_stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("sss", $fullname, $email, $password_hashed);

            if ($insert_stmt->execute()) {
                $success = "Account created successfully! You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Registration failed. Please try again.";
            }

            $insert_stmt->close();
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="csss/reg.css">
    <link rel="icon" href="img/Logos.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <section class="register-section">
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="card register-card shadow-lg">
                        <div class="row g-0">
                            <!-- Left image -->
                            <div class="col-md-6 d-none d-md-block">
                                <img src="img/signup.jpg" alt="Sign Up" class="img-fluid rounded-start register-img">
                            </div>

                            <!-- Right form -->
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="register-content w-100 text-center px-4">
                                    <h1 class="brand-title">PRINCESS TOUCH</h1>
                                    <h5 class="subtitle mb-3">Create Your Account</h5>
                                    <p class="intro-text">
                                        Join us to enjoy personalized skincare tips, track your orders, and get
                                        exclusive product offers.
                                    </p>

                                    <!-- Display messages -->
                                    <?php if (!empty($error)): ?>
                                        <div style="color:red; margin-bottom:10px;"><?= $error ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($success)): ?>
                                        <div style="color:green; margin-bottom:10px;"><?= $success ?></div>
                                    <?php endif; ?>

                                    <form action="reg.php" method="POST">
                                        <div class="form-area text-start">
                                            <div class="mb-3">
                                                <input type="text" name="fullname" class="form-control input-field"
                                                    placeholder="Full Name" required>
                                            </div>

                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control input-field"
                                                    placeholder="Email" required>
                                            </div>

                                            <div class="mb-2">
                                                <input type="password" name="password" id="password"
                                                    class="form-control input-field" placeholder="Password" required>
                                            </div>

                                            <div class="show-password mb-3">
                                                <input type="checkbox" onclick="togglePassword('password')"
                                                    id="showPass1">
                                                <label for="showPass1">Show Password</label>
                                            </div>

                                            <div class="mb-2">
                                                <input type="password" name="confirm_password" id="confirmPassword"
                                                    class="form-control input-field" placeholder="Confirm Password"
                                                    required>
                                            </div>

                                            <div class="show-password mb-4">
                                                <input type="checkbox" onclick="togglePassword('confirmPassword')"
                                                    id="showPass2">
                                                <label for="showPass2">Show Password</label>
                                            </div>

                                            <button type="submit" name="register"
                                                class="btn btn-register w-100 py-2">Create Account</button>
                                        </div>
                                    </form>

                                    <p class="mt-4 mb-1">
                                        Already have an account?
                                        <a href="login.php" class="login-link">Log in</a>
                                    </p>
                                    <a href="index.php" class="back-link">← Back to website</a>

                                    <div class="divider my-4">or</div>

                                    <div class="d-flex justify-content-center gap-3">
                                        <button class="btn btn-social"><i class="fab fa-google me-2"></i>
                                            Google</button>
                                        <button class="btn btn-social"><i class="fab fa-facebook-f me-2"></i>
                                            Facebook</button>
                                    </div>

                                    <div class="footer-links mt-4 d-flex justify-content-center gap-3">
                                        <a href="ToS.php">Terms of Service</a>
                                        <a href="policy.php">Privacy Policy</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>

</html>