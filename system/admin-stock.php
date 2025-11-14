<?php
// Include database connection
include "../db/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Stock Management | Princess Touch</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="img/Logos.jpg">
    <link rel="stylesheet" href="admin-temp.css">
</head>

<body>
    <!-- 🌸 NAVBAR -->
    <nav class="admin-navbar">
        <div class="container">
            <h2 class="brand">PRINCESS TOUCH</h2>
            <ul class="nav-links">
                <li><a href="admin-stock.php" class="active">Stock</a></li>
                <li><a href="admin-sales.php">Sales</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="../login.php" class="logout-btn">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- 📋 STOCK MANAGEMENT SECTION -->
    <div class="admin-box">
        <h3 class="admin-title">STOCK MANAGEMENT</h3>

        <div class="admin-controls">
            <input type="text" id="searchInput" class="form-control" placeholder="Search stock...">

            <select id="categoryFilter" class="form-select">
                <option value="">All Categories</option>
                <option value="makeup">Makeup</option>
                <option value="cosmetics">Cosmetics</option>
                <option value="skincare">Skincare</option>
            </select>
        </div>

        <!-- 🧾 STOCK TABLE -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date Added</th>
                        <th>Last Updated</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="stockTableBody">
                    <?php
                    // Fetch stock records from database
                    $sql = "SELECT * FROM stocks ORDER BY date_added DESC";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $statusClass = ($row['status'] == 'available') ? "done" : "pending";
                            echo "<tr>
                                <td>{$row['product_name']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['quantity']}</td>
                                <td>₱" . number_format($row['price'], 2) . "</td>
                                <td>{$row['date_added']}</td>
                                <td>{$row['last_updated']}</td>
                                <td><span class='status {$statusClass}'>{$row['status']}</span></td>
                                <td>
                                    <button class='btn-edit' data-id='{$row['id']}'>Edit</button>
                                    <button class='btn-delete' data-id='{$row['id']}'>Delete</button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No stock records found.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- 💻 SCRIPT SECTION -->
    <script>
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const tableBody = document.getElementById('stockTableBody');

        // 🔍 FILTER LOGIC
        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();
            const categoryValue = categoryFilter.value.toLowerCase();

            Array.from(tableBody.rows).forEach(row => {
                const productName = row.cells[0].textContent.toLowerCase();
                const category = row.cells[1].textContent.toLowerCase();

                const matchesSearch = productName.includes(searchValue);
                const matchesCategory = categoryValue === "" || category === categoryValue;

                row.style.display = (matchesSearch && matchesCategory) ? "" : "none";
            });
        }

        searchInput.addEventListener('input', filterTable);
        categoryFilter.addEventListener('change', filterTable);

        // ✏️ EDIT & DELETE FUNCTIONALITY
        tableBody.addEventListener('click', function (event) {
            const target = event.target;

            // 🗑 DELETE PRODUCT
            if (target.classList.contains('btn-delete')) {
                if (confirm("Are you sure you want to delete this product?")) {
                    const id = target.getAttribute('data-id');
                    fetch('delete_stock.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({ id })
                    })
                        .then(response => response.text())
                        .then(data => {
                            if (data.trim() === 'success') {
                                alert("✅ Product deleted successfully!");
                                target.closest('tr').remove();
                            } else {
                                alert("⚠️ Error deleting product.");
                            }
                        })
                        .catch(err => {
                            console.error("Error:", err);
                            alert("❌ Server connection error.");
                        });
                }
                return;
            }

            // ✏️ EDIT PRODUCT
            if (target.classList.contains('btn-edit')) {
                const row = target.closest('tr');
                const id = target.getAttribute('data-id');

                // --- EDIT MODE ---
                if (target.textContent === 'Edit') {
                    // Make cells editable except date/status
                    for (let i = 0; i < 6; i++) {
                        const cell = row.cells[i];
                        cell.setAttribute('data-original', cell.textContent);
                        cell.contentEditable = (i !== 4 && i !== 5); // Disable date editing
                        if (i !== 4 && i !== 5) cell.style.backgroundColor = '#fff0f4';
                    }

                    // 🧩 Replace status cell with dropdown
                    const statusCell = row.cells[6];
                    const currentStatus = statusCell.textContent.trim();
                    statusCell.setAttribute('data-original', currentStatus);

                    const select = document.createElement('select');
                    select.className = 'form-select form-select-sm';
                    select.innerHTML = `
                    <option value="Out of Stock" ${currentStatus === "Out of Stock" ? "selected" : ""}>Out of Stock</option>
                    <option value="Available" ${currentStatus === "Available" ? "selected" : ""}>Available</option>
                    <option value="Discontinued" ${currentStatus === "Discontinued" ? "selected" : ""}>Discontinued</option>
                `;
                    statusCell.textContent = "";
                    statusCell.appendChild(select);

                    target.textContent = 'Save';
                    target.classList.add('btn-save');
                }

                // --- SAVE MODE ---
                else if (target.textContent === 'Save') {
                    const updatedData = {
                        id: id,
                        product_name: row.cells[0].textContent.trim(),
                        category: row.cells[1].textContent.trim(),
                        quantity: row.cells[2].textContent.trim(),
                        price: row.cells[3].textContent.replace(/[₱,]/g, '').trim(),
                        status: row.cells[6].querySelector('select').value.trim()
                    };

                    // 📨 Send update to database
                    fetch('update_stock.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams(updatedData)
                    })
                        .then(response => response.text())
                        .then(data => {
                            if (data.trim() === 'success') {
                                alert("✅ Product updated successfully!");

                                // Update timestamp
                                row.cells[5].textContent = new Date().toISOString().split('T')[0];

                                // Replace dropdown with formatted status
                                const newStatus = updatedData.status;
                                row.cells[6].innerHTML = `
                            <span class="status ${newStatus === 'Available' ? 'done' : 'pending'
                                    }">${newStatus}</span>
                        `;
                            } else {
                                alert("⚠️ Error updating product in database.");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("❌ Connection error while updating.");
                        });

                    // Reset editable cells
                    for (let i = 0; i < 6; i++) {
                        const cell = row.cells[i];
                        cell.contentEditable = false;
                        cell.style.backgroundColor = '';
                    }

                    target.textContent = 'Edit';
                    target.classList.remove('btn-save');
                }
            }
        });
    </script>
</body>

</html>