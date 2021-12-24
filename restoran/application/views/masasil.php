<?php

    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masa Düzenleme</title>
    <style>
        .masaekle {
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

        .durum {
            font-size: 30px;
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }

        .yonlendirme {
            font-size: 20px;
            text-decoration: none;
            color: rgb(73, 156, 189);
            background-color:white;
            padding: 10px 15px;
            border-radius: 10px;
            transition: 400ms;
        }

        .yonlendirme:hover {
            background-color: rgb(73,156,189);
            color:white;
        }
    </style>
</head>
<body>
<section class="masaekle">
    <div class="eklemeislemi">
        <p class="durum"><?php
        
            $kimlik = $this->uri->segment(3);

            

            if($this->db->delete('masa', array('id' => $kimlik)) && $this->db->delete('siparisler', array('id' => $kimlik))){
                echo "İşlem Başarılı";
            }
            else {
                echo "Bir Hata Meydana Geldi";
            }
        
        ?>
        </p>
        <a class="yonlendirme" href="<?php echo base_url() ?>masaekle">Back to Add Table Page</a>
    </div>
</section>  
</body>
</html>

<?php

    include("footer.php");

?>