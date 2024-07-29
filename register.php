<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Register</title>
</head>

<body>
    <?php
    include("temp_header.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="login_body">
        <form class="login_form" method="post">
            <label class="form_component">Email: </label><br>
            <input class="form_component" type="email" name="email" required><br>
            <label class="form_component">Display Name: </label><br>
            <input class="form_component" type="text" name="nickname" required><br>
            <label class="form_component">Username: </label><br>
            <input class="form_component" type="text" name="username" required><br>
            <label class="form_component">Password: </label><br>
            <input class="form_component" type="password" name="password" required><br>
            <input class="form_component" type="submit" name="submit" value="Register">
        </form>
    </div>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);;
    $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($password, PASSWORD_DEFAULT);
    echo "Email: $email <br> Username: $username <br> Password: $password";
    include("database.php");
    $query = mysqli_query($conn, "INSERT INTO users (username, password, nickname, email) VALUES
                                     ('$username', '$password', '$nickname', '$email')");
}

?>