<?php
include '../db/db_connect.php';

// Step 1: Fetch appointment data by ID
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $appointment = $result->fetch_assoc();
  } else {
    die("Appointment not found!");
  }

  $stmt->close();
} else {
  die("No appointment ID provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Appointment</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card shadow-sm p-4">
    <h2 class="mb-4">Edit Appointment</h2>

    <form action="update_appointment.php" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($appointment['id']) ?>">

      <div class="mb-3">
        <label class="form-label">Client Name</label>
        <input type="text" name="client_name" class="form-control" value="<?= htmlspecialchars($appointment['client_name']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($appointment['date']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Time</label>
        <input type="time" name="time" class="form-control" value="<?= htmlspecialchars($appointment['time']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Service</label>
        <input type="text" name="service" class="form-control" value="<?= htmlspecialchars($appointment['service']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="Pending" <?= $appointment['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
          <option value="Confirmed" <?= $appointment['status'] === 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
          <option value="Completed" <?= $appointment['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
          <option value="Cancelled" <?= $appointment['status'] === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Update Appointment</button>
      <a href="appointments_list.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>

</body>
</html>
