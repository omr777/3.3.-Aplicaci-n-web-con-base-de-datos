<?php
include('config.php');
include('session.php');
verifySession();

$page = $_POST['page'] ?? 1;
$limit = $_POST['limit'] ?? 10;
$search = $_POST['search'] ?? '';
$order = $_POST['order'] ?? 'ASC';
$start = ($page - 1) * $limit;

$query = "SELECT * FROM personas WHERE apellido LIKE :search ORDER BY fecha_registro $order LIMIT $start, $limit";
$stmt = $conn->prepare($query);
$stmt->execute(['search' => "%$search%"]);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalQuery = "SELECT COUNT(*) FROM personas WHERE apellido LIKE :search";
$totalStmt = $conn->prepare($totalQuery);
$totalStmt->execute(['search' => "%$search%"]);
$totalRecords = $totalStmt->fetchColumn();
$totalPages = ceil($totalRecords / $limit);

echo json_encode(['records' => $records, 'totalPages' => $totalPages]);
?>
