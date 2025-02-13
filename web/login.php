<?php

ob_start();
session_start();

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

   $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";

    $result = $conn->query($sql);

    echo "<link rel='stylesheet' href='assets/style.css'>";
   

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user;
        if ($user === "admin") {
            header("Location: flag.php");
			
        } else {
            header("Location: user.php");
			
        }
        exit();
    } else {
		 echo "<div class='container'>";
        echo "<p style='color:red;'>Credenziali errate!</p>";
        echo "<a href='register.php'>Non sei registrato? Registrati qui</a>";
		echo "</div>";
    }

    
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
        <br>
        <a href="register.php">Non hai un account? Registrati qui</a>
    </div>
</body>
</html>
