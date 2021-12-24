<?php
    include("header.php");
    $masano = $this->uri->segment(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap Ödendi</title>
    <style> 
        .odendi {
            width: 100%;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .odendi p {
            font-size: 20px;
            background-color: rgb(73, 156, 189);
            padding: 15px;
            border-radius: 20px;
            color: white;
        }
    </style>
</head>
<body>

    <div class="odendi">
        <p>
            <?php

                $data = array(
                    'durum' => 'kapali'
                );

                if($this->db->where('id', $masano) && $this->db->update('siparisler', $data)){

                    echo "Hesap Ödendi ve Masa Kapalı Duruma Getirildi.";
                }
                else {
                    echo "Bir hata meydana geldi";
                }

                $this->db->query("INSERT INTO tumveriler SELECT * FROM siparisler WHERE id = $masano;");
            ?>
        </p>
        <?php header('Refresh:2; url= '. base_url()); ?>
    </diV>
</body>
</html>

<?php
    include("footer.php");
?>