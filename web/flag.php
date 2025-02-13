<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] !== "admin") {
    header("Location: user.php");
    exit();
}

$servername = "db";
$username = "ctfuser";
$password = "ctfpass";
$dbname = "ctf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT secret_flag FROM flag";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>FLAG</title>
</head>
<body>
    <div class="container">
        <h2>FLAG: <?php echo htmlspecialchars($row['secret_flag']); ?></h2>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
