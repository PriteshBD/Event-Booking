<?php
session_start();
include '../config/db.php';

// Check if user is Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access Denied. Admins Only.");
}

$event_id = $_GET['id'];
$event_stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$event_stmt->execute([$event_id]);
$event = $event_stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    die("Event not found.");
}

if (isset($_POST['update_event'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $speaker = $_POST['speaker'];
    $category = $_POST['category'];

    // Image upload if new
    $target_file = $event['image_path'];
    if (!empty($_FILES["event_image"]["name"])) {
        $target_dir = "../uploads/";
        $image_name = basename($_FILES["event_image"]["name"]);
        $target_file = $target_dir . time() . "_" . $image_name;
        move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file);
    }

    $stmt = $conn->prepare("UPDATE events SET title=?, image_path=?, description=?, location_url=?, price=?, event_date=?, speaker=?, category=? WHERE id=?");
    
    if ($stmt->execute([$title, $target_file, $desc, $location, $price, $date, $speaker, $category, $event_id])) {
        echo "<script>alert('Event Updated Successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error: Unable to update event";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <style>
        body { font-family: sans-serif; background-color: #111827; color: #e5e7eb; padding: 20px; }
        .container { background: #1F2937; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto; }
        h2 { color: #e5e7eb; }
        label { color: #e5e7eb; display: block; margin-top: 10px; }
        input, select, textarea { display: block; margin: 5px 0 15px; padding: 8px; width: 100%; background: #111827; color: #e5e7eb; border: 1px solid #9CA3AF; }
        button { background: #6366f1; color: #040025; border: none; padding: 10px; width: 100%; cursor: pointer; }
        button:hover { background: #22d3ee; }
        a { color: #22d3ee; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Event</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $event['title']; ?>" required>

            <label>Image (leave blank to keep current):</label>
            <input type="file" name="event_image" accept="image/*">

            <label>Speaker:</label>
            <input type="text" name="speaker" value="<?php echo $event['speaker']; ?>">

            <label>Category:</label>
            <select name="category">
                <option value="Stock Market" <?php if($event['category']=='Stock Market') echo 'selected'; ?>>Stock Market</option>
                <option value="Crypto" <?php if($event['category']=='Crypto') echo 'selected'; ?>>Crypto</option>
                <option value="Real Estate" <?php if($event['category']=='Real Estate') echo 'selected'; ?>>Real Estate</option>
                <option value="Banking" <?php if($event['category']=='Banking') echo 'selected'; ?>>Banking</option>
                 <option value="Finance">Finance</option>
            <option value="Networking">Networking</option>
            <option value="Technology">Technology</option>
            <option value="Career Guidance">Career Guidance</option>
            </select>

            <label>Description:</label>
            <textarea name="description" required><?php echo $event['description']; ?></textarea>

            <label>Location (Embed Map HTML):</label>
            <textarea name="location" rows="4" required><?php echo $event['location_url']; ?></textarea>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo $event['price']; ?>">

            <label>Date & Time:</label>
            <input type="datetime-local" name="date" value="<?php echo date('Y-m-d\TH:i', strtotime($event['event_date'])); ?>" required>

            <button type="submit" name="update_event">Update Event</button>
        </form>
        <br>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>