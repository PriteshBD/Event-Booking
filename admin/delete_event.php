<?php
session_start();
include '../config/db.php';

// Check if user is Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Access Denied. Admins Only.");
}

$event_id = $_GET['id'];

if (isset($event_id)) {
    try {
        // Delete related bookings first to avoid foreign key issues
        $stmt1 = $conn->prepare("DELETE FROM bookings WHERE event_id = ?");
        $stmt1->execute([$event_id]);
        
        $stmt2 = $conn->prepare("DELETE FROM reviews WHERE event_id = ?");
        $stmt2->execute([$event_id]);
        
        $stmt3 = $conn->prepare("DELETE FROM events WHERE id = ?");
        if ($stmt3->execute([$event_id])) {
            echo "<script>alert('Event Deleted Successfully!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "Error: Unable to delete event";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No event ID provided.";
}
?>