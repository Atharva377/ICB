<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error: <?php echo $_SESSION["message"]; ?></title>
</head>
<body>
    <div class="error_display">
        <div class="error_message"><?php echo $_SESSION["message"]; ?></div>
        <a href="./login.php"><button>Return to Home</button></a>
    </div>
</body>
</html>