<?php
include "db/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $service = trim($_POST['service']);
    $date = $_POST['date'];
    $message = trim($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, phone, email, service, date, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $phone, $email, $service, $date, $message);

    if ($stmt->execute()) {
        // ✅ Use JavaScript alert, NOT a redirect header
        echo "<script>
            alert('Your appointment has been booked successfully!');
            window.location.href = 'Contact.php';
        </script>";
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // If accessed directly, just show a safe message (not a redirect)

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="csss/contact.css">
    <link href="https://fonts.googleapis.com/css?family=Aboreto" rel="stylesheet">
    <link rel="icon" href="img/Logos.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light py-3 fade-scale">
        <div class="container">
            <a class="navbar-brand fw-bolder fs-2" href="index.php">PRINCESS TOUCH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 gap-4">
                    <li class="nav-item"><a class="nav-link" href="webcus.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="webshop.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="webtrending.php">Trending</a></li>
                    <li class="nav-item"><a class="nav-link" href="webcontact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="webabout.php">About Us</a></li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-6 gap-6 d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="websearch.php">
                            <img src="img/SEARCH.png" alt="" class="icon zoom-on-hover">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="webcart.php">
                            <img src="img/CARTTTT.png" alt="" class="icon zoom-on-hover">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="webfav.php">
                            <img src="img/HEART.jpg" alt="Favorites" class="icon">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.php">
                            <img src="img/pROFILE.png" alt="Profile" class="icon">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <hr class="navbar-line">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 contact-section"
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 20px;">
                <img src="img/IPHONE.png" alt="Phone Icon" class="contact-icon"
                    style="width: 50px; height: 50px; margin-bottom: 10px;">
                <h6 class="mb-1">PHONE</h6>
                <p class="mb-0">0995 2737 231</p>
                <p class="mb-0">MONDAY TO SATURDAY</p>
                <p>8AM - 8PM UTC -8</p>
            </div>
            <div class="col-md-5 contact-section"
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 20px;">
                <img src="img/EMAILLL.png" alt="Gmail Icon" class="contact-icon"
                    style="width: 50px; height: 50px; margin-bottom: 10px;">
                <h6 class="mb-1">MAIL</h6>
                <p>princesstouch@gmail.com</p>
            </div>
        </div>
        <hr class="navbar-line">

        <div class="form-container">
            <br>
            <br>
            <h5 class="text-center mb-4">BOOK AN APPOINTMENT AT PRINCESS TOUCH</h5>
            <br>
            <form id="appointmentForm">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control rounded-3" name="first_name" placeholder="FIRST NAME" required />
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control rounded-3" name="last_name" placeholder="LAST NAME" required />
                    </div>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control rounded-3" name="phone" placeholder="PHONE" required />
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control rounded-3" name="email" placeholder="YOUR EMAIL ADDRESS" required />
                </div>
                <div class="mb-3">
                    <select class="form-select rounded-3" name="service" required>
                        <option value="" selected disabled>SELECT SERVICE APPOINTMENT</option>
                        <option>Makeup Session</option>
                        <option>Hair & Makeup</option>
                        <option>Facial</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control rounded-3" name="date" required />
                </div>
                <div class="mb-3">
                    <textarea class="form-control rounded-3" name="message" rows="2" placeholder="YOUR MESSAGE / SPECIAL REQUEST"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-submit"
                        style="background-color: #D48787; color: white; border: none; border-radius: 100px;">
                        Book now!
                    </button>
                </div>
            </form>

        </div>


    </div>
    <footer class="footer-section mt-5">
        <div class="footer-content container py-5">
            <div class="row align-items-center justify-content-between text-white">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h4><span class="fw-bold">Princess Touch</span> offers gentle yet luxurious skincare made with
                        nature’s finest ingredients and backed by science. Our mission is to illuminate, nourish, and
                        restore your natural glow — helping every skin type feel confident, radiant, and cared for.</h4>
                    <button class="footer-btn mt-4">Explore more</button>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <ul class="list-unstyled mb-4">
                        <li><a href="About.php">About Us</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="Contact.php">Contact Us</a></li>
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
        // FAQ toggle
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.parentElement;
                faqItem.classList.toggle('active');
            });
        });

        // Appointment form submission
        const form = document.getElementById('appointmentForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // prevent page reload
            alert('Your appointment has been sent to the admin!');
            form.reset(); // Optional: Reset the form after submission
            // Redirect to webcus.php
            window.location.href = 'webcus.php';

            const formData = new FormData(form);

            fetch('system/admin-appointment.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        alert('Your appointment has been sent to the admin!');
                        form.reset(); // optional: clear form
                        window.location.href = 'webcus.php'; // redirect after success
                    } else {
                        console.error(data);
                        alert('Error submitting appointment.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Error sending appointment.');
                });
        });

        // Fetch appointments for admin page
        function fetchAppointments() {
            fetch('system/admin-appointment.php')
                .then(res => res.json())
                .then(data => {
                    const tableBody = document.getElementById('appointmentTableBody');
                    tableBody.innerHTML = '';
                    if (data.length === 0) {
                        tableBody.innerHTML = '<tr><td colspan="6">No appointments found</td></tr>';
                    } else {
                        data.forEach(row => {
                            tableBody.innerHTML += `
                                <tr data-id="${row.id}">
                                    <td>${row.first_name} ${row.last_name}</td>
                                    <td>${row.date}</td>
                                    <td>${row.service}</td>
                                    <td>${row.time || ''}</td>
                                    <td>${row.status}</td>
                                    <td>
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>`;
                        });
                    }
                })
                .catch(err => console.error(err));
        }

        // Initial fetch
        fetchAppointments();

        // Poll every 5 seconds for new appointments
        setInterval(fetchAppointments, 5000);
    </script>
</body>

</html>