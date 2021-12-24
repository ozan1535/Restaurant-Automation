<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include("header.css"); ?>
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h4><a href="<?php echo base_url() ?>">Home</a></h4>
        </div>
        <div class="time">
            <span id="saat"></span>
            <span id="dakika"></span>
            <span id="saniye"></span>
        </div>
    </div>

    <script>

        setInterval(() => {
            var saat = new Date().getHours();
            var dakika = new Date().getMinutes();
            var saniye = new Date().getSeconds();
            document.getElementById("saat").innerHTML = saat + " :";
            document.getElementById("dakika").innerHTML = dakika+ " :";
            document.getElementById("saniye").innerHTML = saniye;
        }, 1000);
    </script>
</body>
</html>