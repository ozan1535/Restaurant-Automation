<?php

    include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Eklendi</title>
    <style>
        .eklendi {
            width: 100%;
            min-height: 80vh;
            height: auto;
            background-color: rgb(166, 194, 206);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .eklendi p {
            font-size: 30px;
        }

        .eklendi a {
            text-decoration: none;
            font-size: 30px;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="eklendi">
<?php

$tur = $this->input->get("veriadi");
$isim = $this->input->get("urun");
$fiyat = $this->input->get("fiyat");

$data = array(
    'tur' => $tur,
    'isim' => $isim,
    'fiyat' => $fiyat
 );
 ?>
 <p><?php
     $this->load->database();    
     $this->db->query("ALTER TABLE siparisler ADD $isim TEXT NULL");
     $this->db->query("ALTER TABLE tumveriler ADD $isim TEXT NULL");
 if($this->db->insert('menu', $data)){
     echo "Başarıyla eklendi";
 }
 else{
     echo "Bir hata meydana geldi";
 }
?></p>
<a href="<?php echo base_url() ?>menuekle">Turn Back</a>
</div>
</body>
</html>
<?php

     include("footer.php");

?>