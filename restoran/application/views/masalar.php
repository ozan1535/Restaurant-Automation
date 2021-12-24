<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Al</title>
    <style>
        <?php include("masalar.css"); ?>
    </style>
</head>
<body>
<?php 
?>
    <section class="masasec">
        <div class="masalar">
            <?php
            $query = $this->db->order_by('masa_adi', 'ASC')->get("masa");
            foreach($query->result() as $row){
                $renk = $this->db->query("SELECT durum FROM siparisler where masa_adi='$row->masa_adi'")->row();
                ?>
            <div class="secimyap" style='<?php 
            if($renk->durum == "acik"){
               echo "background-color: rgb(2227, 43, 70) !important;";
            }
            else {
                  echo "background-color: rgb(148, 189, 86) !important;";
                }
        ?>'>
                <div>
                    <p class="numara">Table Number</p>
                    <hr>
                </div>
                <p class="masanumara"><?php echo $row->masa_adi ?></p>
                <a href="<?php 
            if($renk->durum == "acik"){
               echo base_url();?>acikmasagoster/<?php echo $row->id;
            }
            else {
                echo base_url();?>siparisekrani/<?php echo $row->id;
                }
        ?>"><?php 
            if($renk->durum == "acik"){
               echo "Siparişi Göster";
            }
            else {
                  echo "Sipariş Al";
                }
        ?></a>
            </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>