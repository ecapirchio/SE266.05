<?php
session_start();
include(__DIR__ . '/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the login credentials
    $username = $_POST['username'];
    $passkey = $_POST['passkey'];

    // Perform authentication (you should replace this with your authentication logic)
    if (authenticateUser($username, $passkey)==1) {
        // Authentication successful
        $_SESSION['username'] = $username;
        header("Location: viewSuperheros.php");
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid username or password";
    }
}

// HTML form for login
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="passkey">Password:</label>
        <input type="passkey" id="passkey" name="passkey" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

<?php
// Replace this function with your actual authentication logic
function authenticateUser($username, $passkey) {
    // Your authentication logic here (e.g., check against a database)
    // Return true if authentication succeeds, false otherwise
    // Remember to encrypt and compare passkeys securely

    global $db;
    $results = [];
    $stmt = $db->prepare("SELECT * FROM users WHERE 0=0 AND username LIKE :username AND passkey LIKE :passkey");

    $binds = array(
        ":username" => $username,
        ":passkey" => sha1($passkey)
    );

    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = '1';
    }
    else{
        $results = '2';
    }

    return $results;
}
?>