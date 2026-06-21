<?php
session_start();

require_once("../include/settings.php");

$message = "";

if (isset($_POST["login"]))
{
    $conn = mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    if (!$conn)
    {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string(
        $conn,
        trim($_POST["username"])
    );

    $password = mysqli_real_escape_string(
        $conn,
        trim($_POST["password"])
    );

    $sql = "
        SELECT *
        FROM users
        WHERE username='$username'
        AND password='$password'
    ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["username"] = $row["username"];

        header("Location: manage.php");
        exit();
    }
    else
    {
        $message = "Invalid username or password.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HR Manager Login</title>

<style>

/* ===== Login Page ===== */

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f5fbf7;
    color: #173128;
}

.login-container {
    width: 400px;
    max-width: 90%;
    margin: 100px auto;
    background: #ffffff;
    border: 1px solid #d7eadf;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 12px 30px rgba(17, 59, 42, 0.06);
}

.login-container h1 {
    text-align: center;
    color: #0c7a52;
    margin-bottom: 25px;
}

.login-container label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #b7dfc7;
    border-radius: 12px;
    background: #ffffff;
    box-sizing: border-box;
}

.login-container input:focus {
    outline: none;
    border-color: #0c7a52;
}

.login-container button {
    width: 100%;
    padding: 12px;
    background: #0c7a52;
    color: #ffffff;
    border: none;
    border-radius: 999px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.login-container button:hover {
    background: #09573b;
}

.error-message {
    color: #c62828;
    text-align: center;
    font-weight: bold;
    margin-bottom: 15px;
}

.login-footer {
    text-align: center;
    margin-top: 15px;
    color: #527267;
    font-size: 0.9rem;
}
</style>

</head>

<body>

<div class="login-container">

<h1>HR Manager Login</h1>

<?php
if (!empty($message))
{
    echo "<p class='error-message'>$message</p>";
}
?>

<form method="post" action="login.php">

<label for="username">Username</label>

<input
    type="text"
    id="username"
    name="username"
    required>

<label for="password">Password</label>

<input
    type="password"
    id="password"
    name="password"
    required>

<button
    type="submit"
    name="login">
    Login
</button>

</form>

</div>

</body>
</html>