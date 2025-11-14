<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Receipt - Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Aboreto" rel="stylesheet" />
    <link rel="stylesheet" href="css/receipt.css" />
    <link rel="icon" href="img/Logos.jpg">
</head>

<body>
    <section class="receipt-section py-5">
        <div class="container">
            <div class="receipt-card shadow-lg rounded-4 p-4">

                <!-- Header -->
                <div class="text-center mb-4 position-relative">
                    <h2 class="fw-bold text-uppercase">Product Receipt</h2>
                    <hr class="mx-auto mt-3" style="width: 80px; border: 2px solid #d16b8f;">
                </div>

                <!-- Customer Details -->
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <div class="info-box p-4 mb-4 rounded-4 shadow-sm">
                            <h5 class="fw-bold mb-3">Customer Information</h5>
                            <p><strong>Name:</strong> Miguel M. Lulu</p>
                            <p><strong>Address:</strong> Don Cornelio Subdivision, Dau Mabalacat Pampanga</p>
                            <p><strong>Contact:</strong> 0946-133-1580</p>
                            <p><strong>Date:</strong> October 23, 2023</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="info-box p-4 mb-4 rounded-4 shadow-sm">
                            <h5 class="fw-bold mb-3">Payment Summary</h5>
                            <p><strong>Payment Method:</strong> Cash on Delivery</p>
                            <p><strong>Date of Purchase:</strong> July 23, 2023</p>
                            <p><strong>Customer:</strong> Miguel M. Lulu</p>
                            <hr>
                            <p class="fs-5 fw-bold text-highlight">Total: ₱7,499.00</p>
                        </div>
                    </div>
                </div>

                <!-- Purchased Items -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h4 class="fw-bold text-center mb-4">Purchased Products</h4>

                        <div
                            class="product-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <img src="img/best1.png" alt="Perfume" class="me-3 rounded-3" width="70" height="70">
                                <div>
                                    <h5 class="mb-1">Cheirosa 62 Perfume Mist</h5>
                                    <p class="mb-0">₱2,750.00 &nbsp;&nbsp; | &nbsp;&nbsp; Qty: 1</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="product-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <img src="img/best2.png" alt="Blush" class="me-3 rounded-3" width="70" height="70">
                                <div>
                                    <h5 class="mb-1">Soft Pinch Dewy Liquid Blush Mini</h5>
                                    <p class="mb-0">₱1,200.00 &nbsp;&nbsp; | &nbsp;&nbsp; Qty: 1</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="product-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <img src="img/best3.png" alt="Essence" class="me-3 rounded-3" width="70" height="70">
                                <div>
                                    <h5 class="mb-1">Mid-Day Miracle Essence</h5>
                                    <p class="mb-0">₱3,499.00 &nbsp;&nbsp; | &nbsp;&nbsp; Qty: 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back to Home -->
                <div class="text-center mt-5">
                    <a href="index.php" class="btn back-home-btn px-5 py-2">← Back to Home</a>
                </div>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.js"></script>
</body>

</html>