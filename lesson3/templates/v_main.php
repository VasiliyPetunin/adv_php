<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
</head>
<body>
    <h1><?= $title ?></h1>
<?php
    foreach($photos as $image): ?>
        <div>
            <a href="openIMG.php?img=<?= $image ?>" target="_blank"><img width="500" height="500" src="images/<?= $image ?>" alt="<?= $image ?>"></a>
        </div>
<?php
    endforeach;
    ?>
</body>
</html>