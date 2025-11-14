<?php
include "../db/db_connect.php";


$result = $conn->query("SELECT * FROM sales ORDER BY Date DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sales Record | Princess Touch</title>
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
                <li><a href="admin-sales.php" class="active">Sales</a></li>
                <li><a href="admin-appointment.php">Appointments</a></li>
                <li><a href="../login.php" class="logout-btn">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="admin-box">
        <h3 class="admin-title">SALES RECORD</h3>

        <div class="admin-controls">
            <input type="text" id="salesSearch" class="form-control" placeholder="Search product...">
            <select id="salesCategory" class="form-select">
                <option value="">All Products</option>
                <option value="lip gloss">Lip Gloss</option>
                <option value="blush palette">Blush Palette</option>
            </select>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>PRODUCT</th>
                        <th>QUANTITY</th>
                        <th>TOTAL AMOUNT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="salesTableBody">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['Date']) ?></td>
                            <td><?= htmlspecialchars($row['Product_name']) ?></td>
                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                            <td>₱<?= number_format($row['total_amount'], 2) ?></td>
                            <td>
                                <button class="btn-edit" data-id="<?= $row['id'] ?>">Edit</button>
                                <button class="btn-delete" data-id="<?= $row['id'] ?>">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">TOTAL:</th>
                        <th id="salesTotal">₱0.00</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        const salesSearch = document.getElementById('salesSearch');
        const salesCategory = document.getElementById('salesCategory');
        const salesTableBody = document.getElementById('salesTableBody');
        const salesTotalElem = document.getElementById('salesTotal');

        // Filter table
        function filterSales() {
            const searchValue = salesSearch.value.toLowerCase();
            const categoryValue = salesCategory.value.toLowerCase();
            let total = 0;

            Array.from(salesTableBody.rows).forEach(row => {
                const product = row.cells[1].textContent.toLowerCase();
                const amountText = row.cells[3].textContent.replace(/[^0-9.]/g, '');
                const amount = parseFloat(amountText);
                const matchesSearch = product.includes(searchValue);
                const matchesCategory = categoryValue === "" || product === categoryValue;

                if (matchesSearch && matchesCategory) {
                    row.style.display = "";
                    total += amount;
                } else {
                    row.style.display = "none";
                }
            });

            salesTotalElem.textContent = `₱${total.toFixed(2)}`;
        }

        salesSearch.addEventListener('input', filterSales);
        salesCategory.addEventListener('change', filterSales);
        filterSales();

        // 📝 Edit & Delete
        salesTableBody.addEventListener('click', function (e) {
            const btn = e.target;

            // 🗑 DELETE
            if (btn.classList.contains('btn-delete')) {
                const id = btn.dataset.id;
                if (confirm("Are you sure you want to delete this record?")) {
                    fetch('delete_sales.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({ id })
                    })
                        .then(res => res.text())
                        .then(data => {
                            if (data.trim() === 'success') {
                                btn.closest('tr').remove();
                                filterSales();
                            } else {
                                alert("Error deleting record!");
                            }
                        });
                }
            }

            // ✏️ EDIT
            if (btn.classList.contains('btn-edit')) {
                const row = btn.closest('tr');
                const id = btn.dataset.id;

                if (btn.textContent === "Edit") {
                    for (let i = 0; i < 4; i++) {
                        if (i === 3) continue; // Skip ₱ sign cell
                        row.cells[i].contentEditable = true;
                        row.cells[i].style.backgroundColor = '#fff0f4';
                    }
                    btn.textContent = "Save";
                } else {
                    const updatedData = {
                        id,
                        Date: row.cells[0].textContent.trim(),
                        Product_name: row.cells[1].textContent.trim(),
                        quantity: row.cells[2].textContent.trim(),
                        total_amount: row.cells[3].textContent.replace(/[₱,]/g, '').trim()
                    };

                    fetch('update_sales.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams(updatedData)
                    })
                        .then(res => res.text())
                        .then(data => {
                            if (data.trim() === 'success') {
                                alert("Sales record updated!");
                                row.cells[3].textContent = `₱${parseFloat(updatedData.total_amount).toFixed(2)}`;
                                for (let i = 0; i < 4; i++) {
                                    row.cells[i].contentEditable = false;
                                    row.cells[i].style.backgroundColor = '';
                                }
                                btn.textContent = "Edit";
                                filterSales();
                            } else {
                                alert("Error updating record.");
                            }
                        });
                }
            }
        });
    </script>
</body>

</html>