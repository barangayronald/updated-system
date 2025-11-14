<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout - Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Aboreto" rel="stylesheet" />
    <link rel="stylesheet" href="css/checkout.css" />
    <link rel="icon" href="img/Logos.jpg">
</head>

<body>
    <section class="checkout-section py-5">
        <div class="container">
            <div class="checkout-card shadow-lg rounded-4 p-4">

                <!-- Header -->
                <div class="text-center mb-4 position-relative">
                    <h2 class="fw-bold text-uppercase">Product Checkout</h2>
                    <hr class="mx-auto mt-3" style="width:80px; border:2px solid #d16b8f;">
                </div>

                <form action="" method="POST">
                    <!-- Address -->
                    <div class="info-box p-4 mb-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-3">Delivery Details</h5>

                        <div class="mb-3 position-relative">
                            <label class="form-label fw-bold">Address:</label>
                            <input type="text" class="form-control" name="address"
                                value="4697 Chicago Street Don Cornelio Subdivision" required />
                            <span class="default">Default</span>
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="form-label fw-bold">Contact Number:</label>
                            <input type="text" class="form-control" name="contact" value="0946-133-1580" required />
                            <span class="default">Default</span>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="info-box p-4 mb-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-3">Your Products</h5>

                        <div class="product-item d-flex align-items-center p-3 mb-3 rounded shadow-sm">
                            <img src="img/best1.png" alt="Perfume" class="me-3 rounded-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Cheirosa 62 Perfume Mist</h5>
                                <p class="mb-0">₱2,750.00 | Qty: 1</p>
                            </div>
                        </div>

                        <div class="product-item d-flex align-items-center p-3 mb-3 rounded shadow-sm">
                            <img src="img/best2.png" alt="Blush" class="me-3 rounded-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Soft Pinch Dewy Liquid Blush Mini</h5>
                                <p class="mb-0">₱1,200.00 | Qty: 1</p>
                            </div>
                        </div>

                        <div class="product-item d-flex align-items-center p-3 mb-3 rounded shadow-sm">
                            <img src="img/best3.png" alt="Essence" class="me-3 rounded-3" width="60" height="60">
                            <div>
                                <h5 class="mb-1">Mid-Day Miracle Essence</h5>
                                <p class="mb-0">₱3,499.00 | Qty: 1</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="info-box p-4 mb-4 rounded-4 shadow-sm">
                        <h5 class="fw-bold mb-3">Payment Method</h5>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment" value="Cash on Delivery"
                                id="cod" required>
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment" value="Bank Transfer" id="bank">
                            <label class="form-check-label" for="bank">Bank Transfer</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" value="GCash" id="gcash">
                            <label class="form-check-label" for="gcash">GCash</label>
                        </div>

                        <div id="bank-info" class="mt-3 d-none">
                            <strong>Bank Details:</strong>
                            <label class="form-label mt-2">Bank Name:</label>
                            <input type="text" class="form-control" value="BDO" />
                            <label class="form-label mt-2">Account Number:</label>
                            <input type="text" class="form-control" value="09-75-655" />
                        </div>

                        <div id="gcash-info" class="mt-3 d-none">
                            <strong>GCash Details:</strong>
                            <label class="form-label mt-2">Account Name:</label>
                            <input type="text" class="form-control" value="Princess Touch" />
                            <label class="form-label mt-2">GCash Number:</label>
                            <input type="text" class="form-control" value="0946-133-1580" />
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="info-box p-4 text-center mb-4 rounded-4 shadow-sm">
                        <p class="mb-1 fw-semibold">Total Payment:</p>
                        <h3 class="text-highlight mb-0">₱7,499.00</h3>
                    </div>

                    <div class="text-center mt-5">
                        <a href="receipt.php" class="btn checkout-btn px-5 py-2">Proceed to Receipt</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.js"></script>
    <script>
        const radios = document.querySelectorAll('input[name="payment"]');
        const bankInfo = document.getElementById('bank-info');
        const gcashInfo = document.getElementById('gcash-info');
        radios.forEach(r => {
            r.addEventListener('change', () => {
                bankInfo.classList.toggle('d-none', r.value !== 'Bank Transfer');
                gcashInfo.classList.toggle('d-none', r.value !== 'GCash');
            });
        });
    </script>
</body>

</html>