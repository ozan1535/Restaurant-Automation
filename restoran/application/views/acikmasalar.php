<?php

    include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Açık Masalar</title>
    <style>
        .acikmasalar {
            width: 100%;
            min-height: 80vh;
            height: auto;
            background-color: rgb(166, 194, 206);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
        }

        .masanumara {
            color: white;
            font-size: 30px;
            padding: 10px 20px;
            background-color: steelblue;
            border-radius: 5px;
        }

       <?php include("masalar.css"); ?>

    </style>
</head>
<body>

<section class="acikmasalar">
        <div class="masalar">
            <?php
            $query = $this->db->where('durum', 'acik')->order_by('masa_adi', 'ASC')->get("siparisler");
            foreach($query->result() as $row){
                ?>
            <div class="secimyap">
                <div>
                    <p class="numara">Table Number</p>
                    <hr>
                </div>
                <p class="masanumara"><?php echo $row->masa_adi ?></p>
                <a href="<?php echo base_url() ?>acikmasagoster/<?php echo $row->id ?>">See Offer</a>
            </div>
            <?php } ?>
        </div>
    </section>
    
</body>
</html>
<?php

    include("footer.php");

?>