<a href="index.php">Home</a>
<a href="database.php">Database</a>
<hr>
<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "phpdb";
$conn = "";

try {
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
} catch (mysqli_sql_exception) {
    echo "could not connect";
}

if (isset($conn)) {
    echo "connected";
}
