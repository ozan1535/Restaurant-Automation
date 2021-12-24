<?php

    include("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include("anasayfa.css"); ?>
    </style>
    <title>Home</title>
</head>
<body>

    <section class="alanlar">
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>yenisiparis">Get a New Order</a>
        </div>
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>acikmasalar">Opened Tables</a>
        </div>
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>masaekle">Add a New Table</a>
        </div>
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>menuekle">Add Drink or Food</a>
        </div>
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>hesapmakinesi">Calculator</a>
        </div>
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>istatistikler">Daily Statistics</a>
        </div>
        <div class="yetkiler">
            <a href="<?php echo base_url() ?>veritabani">Database</a>
        </div>
    </section>

</body>
</html>

<?php

    include("footer.php");

?>