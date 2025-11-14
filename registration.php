<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
    <section class="vh-100" style="background-color: #FAECEC;">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- Left Image -->
                            <div class="col-md-6 d-none d-md-block">
                                <img src="signup.jpg" alt="registration image" class="img-fluid img-left" style="border-radius: 1rem 0 0 1rem;"/>
                            </div>

                            <!-- Right Form -->
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="register-container text-center w-100">
                                    <h1>PRINCESS TOUCH</h1>
                                    <h5 class="mt-2 mb-3">CREATE ACCOUNT</h5>
                                    <p class="mb-4 px-4">
                                        Join us to enjoy personalized skincare tips, track your orders, and get exclusive product offers.
                                    </p>

                                    <form>
                                        <div class="form-area">
                                            
                                            <div class="mb-3">
                                                <input type="text" class="form-control" placeholder="Full Name" required />
                                            </div>

                                            
                                            <div class="mb-3">
                                                <input type="email" class="form-control" placeholder="Email" required />
                                            </div>

                                            
                                            <div class="mb-2">
                                                <input type="password" id="password" class="form-control" placeholder="Password" required />
                                            </div>
                                            <div class="show-password-container">
                                                <input class="form-check-input" type="checkbox" onclick="togglePassword('password')" id="showPass1" />
                                                <label class="form-check-label" for="showPass1">Show Password</label>
                                            </div>

                                            
                                            <div class="mb-2">
                                                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required />
                                            </div>
                                            <div class="show-password-container">
                                                <input class="form-check-input" type="checkbox" onclick="togglePassword('confirmPassword')" id="showPass2" />
                                                <label class="form-check-label" for="showPass2">Show Password</label>
                                            </div>

                                            <button type="submit" class="btn btn-register w-50 mb-4 py-2" style="background-color: #CF8888; color: white">Create Account</button>
                                        </div>
                                        <p class="mb-2">
                                        Already have an account?
                                        <a href="login.php" class="fw-semibold text-decoration-none" style="color:#7a5b5b;">Log in</a>
                                        </p>
                                        <a href="#" class="d-block mb-4" style="color:#7a5b5b;">Back to website</a>

                                        <hr class="my-4" />
                                        <p class="mb-3">or</p>

                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-light border px-4"><i class="fab fa-google me-2"></i> Google</button>
                                            <button class="btn btn-light border px-4"><i class="fab fa-facebook-f me-2"></i> Facebook</button>
                                        </div>

                                        <div class="footer-links mt-4 d-flex justify-content-center gap-3">
                                            <a href="#">Terms of Service</a>
                                            <a href="#">Privacy Policy</a>
                                        </div>
                                    </form>
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
        var input = document.getElementById(id);
        input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
    
</html>