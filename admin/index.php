<?php
session_start();
include '../db/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script>
        function showError() {
            alert("Usuário ou senha inválidos");
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $conn->real_escape_string($_POST['username']);
            $password = md5($conn->real_escape_string($_POST['password']));

            $result = $conn->query("SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'");

            if ($result->num_rows > 0) {
                $_SESSION['loggedin'] = true;
                header("Location: admin.php");
            } else {
                echo "<script>showError();</script>";
            }
        }
        ?>
    </div>
</body>
</html>
