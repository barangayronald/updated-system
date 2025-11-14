<?php
include "../db/db_connect.php"; // Connect to DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE stocks SET product_name=?, category=?, quantity=?, price=?, status=?, last_updated=NOW() WHERE id=?");
    $stmt->bind_param("ssidsi", $product_name, $category, $quantity, $price, $status, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
