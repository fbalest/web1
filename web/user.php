<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Area Utente</title>
</head>
<body>
    <div class="container">
        <h2>Benvenuto, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Questa è la tua area personale, ma non hai accesso al flag!</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
