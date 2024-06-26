<?php include '../menu/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gand IT</title>
    <link rel="stylesheet" href="../menu/menu.php">
    <link rel="stylesheet" href="../mainpage/mainpage.php">
    <link rel="stylesheet" href="../menu/menu.css">
    <link rel="stylesheet" href="/mainpage/style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="topBarContainer"></div>
    <main>
        <div>
            <!-- Bakgrunns bilde -->
            <img id="img" class="banner" src="https://www.bm-t.no/wp-content/uploads/2021/11/gandvgs2.jpg" alt="">
        </div>
        <h1 id="hei" class="hidden">
            Hei <?php echo htmlspecialchars($_SESSION['username']); ?>, velkommen til min side.
        </h1>
    </main>

    <script src="/mainpage/script.js"></script>
    <script src="../menu/menu.js"></script>
    <script src="launch.json"></script>
</body>
</html>
