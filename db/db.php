<?php
$servername = "localhost";
$username = "fgacarla_site";
$password = "@@FgaN0v4P3tr0p0l1s##5173!!";
$dbname = "fgacarla_site";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
