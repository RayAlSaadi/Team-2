$dbname = "railway_ticket_booking";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user
    $sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $message = "Login successful!";
    } else {
        $message = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <h1>User Login</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="search.php">Search Trains</a>
            <a href="booking.php">Book Tickets</a>
            <a href="login.php">Login</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>
    <main>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p><?php echo isset($message) ? $message : ''; ?></p>
    </main>
</body>
</html>

<?php
$conn->close();
?>
