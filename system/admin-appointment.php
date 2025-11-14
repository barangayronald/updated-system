<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../db/db_connect.php";

// --- Handle new appointment submission (from Contact form) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first_name'])) {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $phone      = trim($_POST['phone']);
    $email      = trim($_POST['email']);
    $service    = trim($_POST['service']);
    $date       = $_POST['date'];
    $message    = trim($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, phone, email, service, date, message, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')");
    if (!$stmt) {
        echo "Database prepare error: " . $conn->error;
        exit();
    }
    $stmt->bind_param("sssssss", $first_name, $last_name, $phone, $email, $service, $date, $message);

    if ($stmt->execute()) {
        echo "success"; // JS checks for this exact string
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}

// --- Handle AJAX POST for updating status ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE appointments SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);
    if($stmt->execute()){
        echo "success";
    } else {
        echo "Database Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    exit();
}

// --- Handle AJAX POST for deleting appointment ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $stmt = $conn->prepare("DELETE FROM appointments WHERE id=?");
    $stmt->bind_param("i", $delete_id);
    if($stmt->execute()){
        echo "success";
    } else {
        echo "Database Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    exit();
}

// --- Fetch appointments for display ---
$result = $conn->query("SELECT * FROM appointments ORDER BY date ASC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Appointments | Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="img/Logos.jpg">
    <link rel="stylesheet" href="admin-temp.css">
</head>
<body>
<nav class="admin-navbar">
    <div class="container">
        <h2 class="brand">PRINCESS TOUCH</h2>
        <ul class="nav-links">
            <li><a href="admin-stock.php">Stock</a></li>
            <li><a href="admin-sales.php">Sales</a></li>
            <li><a href="admin-appointment.php" class="active">Appointments</a></li>
            <li><a href="../login.php" class="logout-btn">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="admin-box">
    <h3 class="admin-title">APPOINTMENT SCHEDULE</h3>

    <!-- Table -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="appointmentTableBody">
                <?php
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr data-id='{$row['id']}'>
                                <td>{$row['first_name']} {$row['last_name']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['service']}</td>
                                <td>{$row['status']}</td>
                                <td>
                                    <button class='btn-edit'>Edit Status</button>
                                    <button class='btn-delete'>Delete</button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No appointments found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
const appointmentTableBody = document.getElementById('appointmentTableBody');

appointmentTableBody.addEventListener('click', function(event){
    const target = event.target;
    const row = target.closest('tr');
    const id = row.getAttribute('data-id');

    // --- Edit Status ---
    if(target.classList.contains('btn-edit')){
        const statusCell = row.cells[3];
        if(target.textContent === 'Edit Status'){
            const currentStatus = statusCell.textContent.trim();
            statusCell.innerHTML = `
                <select class="form-select status-select">
                    <option ${currentStatus==='Pending'?'selected':''}>Pending</option>
                    <option ${currentStatus==='Accepted'?'selected':''}>Accepted</option>
                    <option ${currentStatus==='Declined'?'selected':''}>Declined</option>
                </select>`;
            target.textContent = 'Save';
        } else {
            const updatedStatus = statusCell.querySelector('.status-select').value;
            fetch('admin-appointment.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: new URLSearchParams({id: id, status: updatedStatus})
            })
            .then(res => res.text())
            .then(data => {
                if(data.trim() === 'success'){
                    statusCell.textContent = updatedStatus;
                    alert(`Status updated: ${updatedStatus}`);
                    target.textContent = 'Edit Status';
                } else {
                    alert('Error updating status: ' + data);
                }
            });
        }
    }

    // --- Delete Appointment ---
    if(target.classList.contains('btn-delete')){
        if(confirm('Are you sure you want to delete this appointment?')){
            fetch('admin-appointment.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: new URLSearchParams({delete_id: id})
            })
            .then(res => res.text())
            .then(data => {
                if(data.trim() === 'success'){
                    alert('Appointment deleted!');
                    row.remove();
                } else {
                    alert('Error deleting appointment: ' + data);
                }
            });
        }
    }
});
</script>
</body>
</html>
