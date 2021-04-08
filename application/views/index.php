<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/style.css">
    <title>PHP | Ninja Gold Game</title>
</head>
<body>
    <h3>Your Gold: <?= $this->session->userdata("gold") ?></h3>
    <div class="choices">
        <h1>Farm</h1>
        <p>(earns 10 - 20 golds)</p>
        <a href="process_money/farm">Find Gold!</a>
    </div>
    <div class="choices">
        <h1>Cave</h1>
        <p>(earns 5 - 10 golds)</p>
        <a href="process_money/cave">Find Gold!</a>
    </div>
    <div class="choices">
        <h1>House</h1>
        <p>(earns 2 - 5 golds)</p>
        <a href="process_money/house">Find Gold!</a>
    </div>
    <div class="choices">
        <h1>Casino</h1>
        <p>(earns/takes 50 golds)</p>
        <a href="process_money/casino">Find Gold!</a>
    </div>
    <h3>Activities: </h3>
    <div class="activities">
        <?php
            foreach($this->session->userdata("activities") as $index => $choice){
                foreach($choice as $key => $activity){
        ?>
                     <p class=<?= $key ?>><?= $activity ?></p>
        <?php
                }
            }               
        ?>
    </div>
</body>
</html>