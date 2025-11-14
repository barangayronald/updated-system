
<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid method']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$product = trim($input['product_name'] ?? $input['name'] ?? '');
if ($product === '') {
    echo json_encode(['status' => 'error', 'message' => 'Missing product_name']);
    exit;
}

require_once __DIR__ . '/../db/db_connect.php';

if (!isset($conn)) {
    echo json_encode(['status' => 'error', 'message' => 'DB connection not found']);
    exit;
}

$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : null;

if ($user_id === null) {
    $stmt = $conn->prepare("DELETE FROM carts WHERE product_name = ? AND (user_id IS NULL OR user_id = 0)");
    $stmt->bind_param("s", $product);
} else {
    $stmt = $conn->prepare("DELETE FROM carts WHERE product_name = ? AND user_id = ?");
    $stmt->bind_param("si", $product, $user_id);
}

if (!$stmt->execute()) {
    $err = $stmt->error;
    $stmt->close();
    echo json_encode(['status' => 'error', 'message' => $err]);
    exit;
}

$deleted = $stmt->affected_rows;
$stmt->close();

echo json_encode(['status' => 'ok', 'deleted' => $deleted]);
exit;
?>