<?php
ob_start();
$servername = "db"; 
$username = "ctfuser";
$password = "ctfpass";
$dbname = "ctf";

$max_attempts = 10; // Numero massimo di tentativi
$attempts = 0;
$connected = false;

while ($attempts < $max_attempts) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        $attempts++;
        sleep(3); // Aspetta 3 secondi prima di riprovare
    } else {
        $connected = true;
        break;
    }
}

if (!$connected) {
    die("Errore di connessione al database: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (!empty($user) && !empty($pass)) {
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='container'>Registrazione riuscita! <a href='login.php'>Vai al login</a></div>";
        } else {
            echo "<div class='container'>Errore nella registrazione!</div>";
        }
    } else {
        echo "<div class='container'>Inserisci tutti i campi!</div>";
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Registrazione</title>
</head>
<body>
    <div class="container">
        <h2>Registrati</h2>
        <form method="POST">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Registrati">
        </form>
    </div>
</body>
</html>
