<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <?php
    include("temp_header.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="login_body">
        <form class="login_form" method="post">
            <label class="form_component">Username: </label><br>
            <input class="form_component" type="text" name="username" required><br>
            <label class="form_component">Password: </label><br>
            <input class="form_component" type="password" name="password" required><br>
            <input class="form_component" type="submit" name="submit" value="Login">
        </form>
    </div>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    include("database.php");
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    echo mysqli_num_rows($query) . "<br>";
    $row = mysqli_fetch_assoc($query);
    echo $password . "<br>" . $row['password'] . "<br>";
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
}
?>