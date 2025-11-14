<?php
include "../db/db_connect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $Date = $_POST['Date'];
    $Product_name = $_POST['Product_name'];
    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];

    $stmt = $conn->prepare("UPDATE sales SET Date=?, Product_name=?, quantity=?, total_amount=? WHERE id=?");
    $stmt->bind_param("ssidi", $Date, $Product_name, $quantity, $total_amount, $id);

    echo $stmt->execute() ? 'success' : 'error';
    $stmt->close();
    $conn->close();
}
?>
