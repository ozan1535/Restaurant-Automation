<?php

    include("header.php");
    $yeniisim = $this->input->get("yeniisim");
    $yenifiyat = $this->input->get("yenifiyat");
    $kimlik = $this->input->get("numara");
    $eskiisim = $this->input->get("eskiisim");
    $data = array(
        'isim' => $yeniisim,
        'fiyat' => $yenifiyat,
        'id' => $kimlik
    );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Değiştirme</title>
    <style>
        .duzenleme {
            width: 100%;
            min-height: 80vh;
            height: auto;
            background-color: rgb(166, 194, 206);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .bildiri {
            font-size: 30px;
        }

        .don {
            text-decoration: none;
            font-size: 25px;
            margin: 10px;
        }

    </style>
</head>
<body>
    <div class="duzenleme">
    <?php
if($this->db->query("ALTER TABLE siparisler CHANGE $eskiisim $yeniisim MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL;")
    && $this->db->where('id', $kimlik) && $this->db->update('menu', $data)){
        ?> <p class="bildiri"> <?php echo "Başarılı"; ?> </p> <?php
    }
    else {
      ?> <p class="bildiri"> <?php  echo "Başarısız"; ?> </p> 
    <?php } ?>

    <a class="don" href="<?php echo base_url() ?>menuekle">Return to Menu Screen</a>
    </div>
</body>
</html>
<?php

    include("footer.php");

?>