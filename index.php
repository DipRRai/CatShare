<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title></title>
</head>

<body>
    <?php
    include("temp_header.php");
    ?>
    <header class="header">
        <h1>Find a killer deal for the weekend <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?></h1>
        <h1>Upload Photo</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <label for="photo">Select photo to upload:</label>
            <input type="file" name="photo" id="photo" accept=".png, .jpg, .jpeg, .gif" required><br>
            <input type="submit" value="Upload Photo" name="submit"><br>
        </form>
    </header>
    <div class="photo-container">
        <?php
        $query = "SELECT * FROM posts";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>
                <img src='Images/{$row['photo']}' alt='{$row['name']}' class='cat-img'>
                <h5 class='card-title'>Image by: {$row['name']}</h5>
                <p>uploaded on  {$row['created_at']}</p>
            </div>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
if (isset($_POST['submit']) && isset($_SESSION)) {
    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $username = $_SESSION['username'];
    $folder = "Images/" . $filename;

    $query = mysqli_query($conn, "INSERT INTO posts (name, photo) VALUES ('$username', '$filename')");
    if (move_uploaded_file($tempname, $folder)) {
        echo "File uploaded successfully";
        header("Location: index.php");
    }
}
?>