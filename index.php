<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="csss/home.css">
    <link rel="icon" href="img/Logos.jpg">
    <link href="https://fonts.googleapis.com/css?family=Aboreto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light py-3">
        <div class="container">
            <a class="navbar-brand fw-bolder fs-2" href="index.php">PRINCESS TOUCH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 gap-4">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="trending.php">Trending</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>

                    <li class="nav-item">
                        <a class="nav-link" href="search.php">
                            <img src="img/SEARCH.png" alt="" class="icon">
                        </a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="Cart.php">
                            <img src="img/CARTTTT.png" alt="" class="icon">
                            <span id="cartCount"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning d-none">
                                0
                            </span>
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="reg.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <hr class="navbar-line">


    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h6>From earth, with care</h6>
                    <h1 class="fw-bold">Naturally Effective Skincare, Every Day</h1>
                    <p class="text-secondary">
                        Powered by nature, backed by science — our gentle, dermatologist-approved formulas are designed
                        to nourish,
                        protect, and revive your skin. Whether you're tackling breakouts, dryness, or dullness, we have
                        the perfect
                        solution for your skin’s unique needs.
                    </p>
                    <button class="shop-btn mt-3" onclick="window.location.href='shop.php'">Shop Now</button>

                </div>

                <div class="col-lg-6 d-flex gap-3 justify-content-center">
                    <div>
                        <img src="img/model1.jpg" alt="Main model" class="img-fluid mb-3"
                            style="width:300px; height:500px">
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <img src="img/model2.jpg" alt="Model 2" class="img-fluid" style="width:180px; height:240px">
                        <img src="img/model3.jpg" alt="Model 3" class="img-fluid" style="width:180px; height:240px">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section py-5 pb-5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-lg-3 col-md-4 mb-4 mb-lg-0">
                    <img src="img/model6.jpg" alt="Left Image" class="img-fluid side-img">
                </div>

                <div class="col-lg-6 col-md-8">
                    <h3 class="fw-bold mb-3">Why Trust Us?</h3>
                    <p class="about-text fw-bold text-justify">
                        At <span class="brand">Princess Touch</span>, we believe that every skin type deserves to be
                        treated with gentle care and confidence.
                        Our products are thoughtfully made with nature-powered ingredients and backed by dermatological
                        science to give your skin
                        the best of both worlds — safe, effective, and nourishing. Whether you’re dealing with
                        breakouts, dryness, sensitivity,
                        or dullness, each formula is carefully designed to restore balance, boost radiance, and bring
                        out your natural glow.
                        With Princess Touch, you can trust that every product is made to care for your skin, not just
                        cover it.
                    </p>
                    <a href="shop.php" class="footer-btns mt-4">Explore More</a>
                </div>

                <div class="col-lg-3 col-md-4 mb-4 mb-lg-0">
                    <img src="img/model7.jpg" alt="Right Image" class="img-fluid side-img">
                </div>

            </div>
        </div>
    </section>

    <section class="mission-vision py-5">
        <div class="container">
            <div class="row justify-content-center g-5">


                <div class="col-md-5">
                    <div class="card-overlay">
                        <img src="img/model4.jpg" class="img-fluid" alt="Our Mission">
                        <div class="overlay-content">
                            <h3>Our Mission</h3>
                            <p>We’re here to help every skin type glow with confidence through gentle, science-backed
                                care made simple.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-5">
                    <div class="card-overlay">
                        <img src="img/model5.jpg" class="img-fluid" alt="Our Vision">
                        <div class="overlay-content">
                            <h3>Our Vision</h3>
                            <p>To inspire confidence through radiant, healthy skin — making gentle, effective skincare
                                accessible to everyone.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-seller py-5 mt-4">
        <div class="container">
            <div class="text-center position-relative mb-4">
                <h3 class="fw-bold">Our Best Seller</h3>
                <div class="position-absolute top-0 start-0">
                    <h5 class="fw-bold">Products</h5>
                </div>
                <div class="position-absolute top-0 end-0">
                    <a href="#" class="see-all-design">See all</a>
                </div>
            </div>


            <div class="row text-center justify-content-center g-4 py-5">
                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/Best1.png" alt="Product 1" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Soft Pinch Dewy Liquid Blush Mini</h6>
                        <p class="fw-bold mb-0">₱1,200.00 <span
                                class="text-decoration-line-through text-secondary fw-normal">₱1,500.00</span></p>
                        <div>
                            <i class="bi bi-heart fs-4 text-secondary me-2" onclick="toggleHeart(this)"></i>
                            <i class="bi bi-cart fs-4 text-secondary" onclick="addToCart(this)"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/Best2.png" alt="Product 2" class="img-fluid mb-3">
                        <h6 class="fw-semibold">New Vinopure Purifying Gel Cleanser</h6>
                        <p class="fw-bold mb-0">₱1,600.00 <span
                                class="text-decoration-line-through text-secondary fw-normal">₱1,700.00</span></p>
                        <div>
                            <i class="bi bi-heart fs-4 text-secondary me-2" onclick="toggleHeart(this)"></i>
                            <i class="bi bi-cart fs-4 text-secondary" onclick="addToCart(this)"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/Best3.png" alt="Product 3" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Vanish Seamless Finish Foundation Brush</h6>
                        <p class="fw-bold mb-0">₱3,500.00 <span
                                class="text-decoration-line-through text-secondary fw-normal">₱4,500.00</span></p>
                        <div>
                            <i class="bi bi-heart fs-4 text-secondary me-2" onclick="toggleHeart(this)"></i>
                            <i class="bi bi-cart fs-4 text-secondary" onclick="addToCart(this)"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="watch-section py-5 mt-5">
        <div class="container">
            <div class="row align-items-center rounded bg-light-pink p-4">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">Watch How Radiant Skin Starts with the Right Routine — Gentle, Effective,
                        Proven, See our product in action.</h5>
                </div>
                <div class="col-md-6 text-center">
                    <img src="img/watchmodel2.jpg" alt="Model" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section class="best-arrivals py-5 mt-4">
        <div class="container">
            <div class="text-center position-relative mb-4">
                <h3 class="fw-bold">New Arrivals</h3>
                <div class="position-absolute top-0 start-0">
                    <h5 class="fw-bold">Products</h5>
                </div>
                <div class="position-absolute top-0 end-0">
                    <a href="#" class="see-all-design">See all</a>
                </div>
            </div>


            <!-- First row -->
            <div class="row text-center justify-content-center g-4 py-5">
                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/arrival1.png" alt="Product 1" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Soft Pinch Dewy Liquid Blush Mini</h6>
                        <p class="fw-bold mb-0">₱1,200.00
                            <span class="text-decoration-line-through text-secondary fw-normal">₱1,500.00</span>
                        </p>
                        <i class="bi bi-heart"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/arrival2.png" alt="Product 2" class="img-fluid mb-3">
                        <h6 class="fw-semibold">New Vinopure Purifying Gel Cleanser</h6>
                        <p class="fw-bold mb-0">₱1,600.00
                            <span class="text-decoration-line-through text-secondary fw-normal">₱1,700.00</span>
                        </p>
                        <i class="bi bi-heart"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/arrival3.png" alt="Product 3" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Vanish Seamless Finish Foundation Brush</h6>
                        <p class="fw-bold mb-0">₱3,500.00
                            <span class="text-decoration-line-through text-secondary fw-normal">₱4,500.00</span>
                        </p>
                        <i class="bi bi-heart"></i>
                    </div>
                </div>
            </div>

            <!-- Second row -->
            <div class="row text-center justify-content-center g-4 mt-2">
                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/arrival4.png" alt="Product 4" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Hydrating Glow Serum</h6>
                        <p class="fw-bold mb-0">₱2,000.00
                            <span class="text-decoration-line-through text-secondary fw-normal">₱2,300.00</span>
                        </p>
                        <i class="bi bi-heart"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/arrival5.png" alt="Product 5" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Brightening Facial Cleanser</h6>
                        <p class="fw-bold mb-0">₱1,300.00
                            <span class="text-decoration-line-through text-secondary fw-normal">₱1,600.00</span>
                        </p>
                        <i class="bi bi-heart"></i>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card p-3 rounded">
                        <img src="img/arrival6.png" alt="Product 6" class="img-fluid mb-3">
                        <h6 class="fw-semibold">Ultra Soft Makeup Brush</h6>
                        <p class="fw-bold mb-0">₱2,500.00
                            <span class="text-decoration-line-through text-secondary fw-normal">₱3,000.00</span>
                        </p>
                        <i class="bi bi-heart"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seasonal-tips py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Seasonal Skincare Tips</h2>
                <p class="mb-1">Follow us on Instagram</p>
                <a href="#" class="ig-handle">@PrincessTouch</a>
            </div>

            <div class="row justify-content-center g-5">
                <div class="col-md-5">
                    <div class="card-overlay">
                        <img src="img/skintips.jpg" class="img-fluid" alt="Skin Care Tips">
                        <div class="overlay-content">
                            <h3>Skin Care Tips</h3>
                            <p>Explore trusted skincare routines, expert insights, and daily glow secrets for
                                effortlessly beautiful skin.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card-overlay">
                        <img src="img/skintips2.jpg" class="img-fluid" alt="Skin Care Tips 2">
                        <div class="overlay-content">
                            <h3>Skin Care Tips</h3>
                            <p>Effortless glow, proven results — because good skin shouldn’t be complicated.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section py-5 mt-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="img/lastmodel.jpg" alt="FAQ Model" class="img-fluid rounded-4 shadow-sm">
                </div>

                <div class="col-lg-7">
                    <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                    <p class="text-secondary mb-4">
                        Keep your glow alive with pro skincare tips, easy routines, and insider secrets for smooth,
                        radiant skin every day.
                    </p>

                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between align-items-center w-100">
                            <span>What is Princess Touch?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Princess Touch brings out your natural beauty with gentle, effective skincare made for
                                every skin type.</p>
                        </div>
                        <hr>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between align-items-center w-100">
                            <span>Why choose Princess Touch?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Because your skin deserves a royal glow — crafted with care, tested for results, and
                                loved by all skin types.</p>
                        </div>
                        <hr>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between align-items-center w-100">
                            <span>What makes Princess Touch different?</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="faq-answer">
                            <p>We blend gentle ingredients with proven results to give your skin the soft, radiant glow
                                it deserves.</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-section mt-5">
        <div class="footer-content container py-5">
            <div class="row align-items-center justify-content-between text-white">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h4><span class="fw-bold">Princess Touch</span> offers gentle yet luxurious skincare made with
                        nature’s finest ingredients and backed by science. Our mission is to illuminate, nourish, and
                        restore your natural glow — helping every skin type feel confident, radiant, and cared for.</h4>
                    <a href="shop.php" class="footer-btns mt-4">Explore More</a>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <ul class="list-unstyled mb-4">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="trending.php">Trending</a></li>
                    </ul>

                    <ul class="list-unstyled social-links">
                        <li><a href="#">Facebook ↗</a></li>
                        <li><a href="#">Instagram ↗</a></li>
                        <li><a href="#">Twitter ↗</a></li>
                    </ul>
                </div>
            </div>

            <hr class="footer-line mt-4 mb-3">
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between text-white-50 small">
                <a href="ToS.php"><span>Terms of Service</span></a>
                <span>© 2025 Princess Touch. All rights reserved.</span>
                <a href="policy.php"><span>Privacy Policy</span></a>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap.js"></script>

    <script>
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.parentElement;
                faqItem.classList.toggle('active');
            });
        });

        let cartCount = 0;

        function toggleHeart(element) {
            element.classList.toggle('bi-heart');
            element.classList.toggle('bi-heart-fill');
            element.classList.toggle('text-danger');
        }

        function addToCart(icon) {

            if (icon.classList.contains('bi-cart-fill')) {
                icon.classList.remove('bi-cart-fill', 'text-warning');
                icon.classList.add('bi-cart');
                cartCount--;
            } else {

                icon.classList.remove('bi-cart');
                icon.classList.add('bi-cart-fill', 'text-warning');
                cartCount++;
            }

            const cartBadge = document.getElementById('cartCount');
            if (cartBadge) {
                cartBadge.textContent = cartCount;
                if (cartCount > 0) {
                    cartBadge.classList.remove('d-none');
                } else {
                    cartBadge.classList.add('d-none');
                }
            }
        }
    </script>

</body>

</html>