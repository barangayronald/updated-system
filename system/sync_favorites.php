<?php
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$favorites = $input['favorites'] ?? [];

require_once __DIR__ . '/../db/db_connect.php'; // fixed path

$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : null;

if (!is_array($favorites) || count($favorites) === 0) {
    echo json_encode(['status' => 'ok', 'message' => 'no favorites to sync']);
    exit;
}

$errors = [];

foreach ($favorites as $item) {
    $name = trim($item['name'] ?? '');
    $price_raw = $item['price'] ?? '0';
    $price = floatval(str_replace(['₱', ','], '', $price_raw));
    $img = $item['img'] ?? '';
    $quantity = isset($item['quantity']) ? intval($item['quantity']) : 1;

    if ($name === '') continue;

    // check existence
    if ($user_id === null) {
        $stmt = $conn->prepare("SELECT id FROM favorites WHERE product_name = ? AND user_id IS NULL LIMIT 1");
        $stmt->bind_param("s", $name);
    } else {
        $stmt = $conn->prepare("SELECT id FROM favorites WHERE product_name = ? AND user_id = ? LIMIT 1");
        $stmt->bind_param("si", $name, $user_id);
    }

    if (!$stmt->execute()) {
        $errors[] = "select error: " . $stmt->error;
        $stmt->close();
        continue;
    }

    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        $stmt->close();
        if ($user_id === null) {
            $insert = $conn->prepare("INSERT INTO favorites (user_id, product_name, price, img, quantity) VALUES (NULL, ?, ?, ?, ?)");
            $insert->bind_param("sdsi", $name, $price, $img, $quantity);
        } else {
            $insert = $conn->prepare("INSERT INTO favorites (user_id, product_name, price, img, quantity) VALUES (?, ?, ?, ?, ?)");
            $insert->bind_param("isdsi", $user_id, $name, $price, $img, $quantity);
        }

        if (!$insert->execute()) {
            $errors[] = "insert error ({$name}): " . $insert->error;
        }
        $insert->close();
    } else {
        $stmt->close();
    }
}

if (count($errors) > 0) {
    // log and return errors for debugging
    foreach ($errors as $e) { error_log($e); }
    echo json_encode(['status' => 'error', 'errors' => $errors]);
} else {
    echo json_encode(['status' => 'ok']);
}
exit;
?>