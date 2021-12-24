<?php

    include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Silindi</title>
    <style>
        .menusil {
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

        .menusil p {
            font-size: 30px;
        }

        .menusil a {
            text-decoration: none;
            font-size: 25px;
            color: teal;
        }
    </style>
</head>
<body>
    <div class="menusil">
        <p>
            <?php 
                $silinecek = $this->uri->segment(3);
                $query = $this->db->query("SELECT isim FROM menu WHERE id=$silinecek")->row();
               // echo $query->isim;
                if($this->db->delete('menu', array('id' => $silinecek)) && $this->db->query("ALTER TABLE siparisler DROP $query->isim") && $this->db->query("ALTER TABLE tumveriler DROP $query->isim;")){
                    echo "Başarı ile Silindi";
                }
                else {
                   echo "Bir Hata Meydana Geldi";
                }
            ?>
        </p>
        <a href="<?php echo base_url() ?>menuekle">Return to Menu Screen</a>
    </div>
</body>
</html>
<?php

    include("footer.php");

?>