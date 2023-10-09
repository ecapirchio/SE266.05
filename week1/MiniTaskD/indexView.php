<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Task D</title>
</head>
<body>

    <ul>
        <?php foreach ($person as $key => $feature) : ?>
            <li><strong><?= $key; ?></strong> <?= $feature; ?></li>
        <?php endforeach; ?>
    </ul>
</body>