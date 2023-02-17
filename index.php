<?php
require_once "app/app.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Konecta Coffee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <div class="bg-primary m-5">
            <?= $header ?>
        </div>
    </header>
    <nav>
        <?= $lateralNav ?>
    </nav>
    <main>
        <?= $section ?>
    </main>
    <footer>
        <?= $footer ?>
    </footer>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</body>

</html>