<?php

    include("header.php");
    $sorgu = $this->uri->segment(3);
    $i = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verilen Sipariş</title>
    <style>
        table tbody tr:nth-child(1){
            display: none;
        }

        .acikmasalar {
            width: 100%;
            min-height: 80vh;
            height: auto;
            background-color: rgb(166, 194, 206);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items:center;
        }

        .masano {
            margin: 20px;
        }

        table {
            margin: 20px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        table tr:nth-child(2),tr:nth-child(3){
            display: none;
        }

        table th, td {
            padding: 10px 15px;
            text-align: center;
        }

        .linkler {
            display: flex;
        }

        .linkler a {
            text-decoration: none;
            font-size: 20px;
            margin: 20px;
            background-color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <?php
            
        $query = $this->db->query("SELECT * FROM siparisler where id=$sorgu");
        $names = $this->db->query("SHOW COLUMNS FROM restoran.siparisler;");
        $sutunlar = $names->result_array()[1]["Field"];
    ?>
    <div class="acikmasalar">
        <p class="masano">Masa Numarası: <span><?php echo $query->row()->masa_adi; ?></span></p>
        <table border="1">
            <thead>
                <th>Siparişler</th>
                <th>Birim/Porsiyon</th>
            </thead>
            <tbody>
                <?php foreach ($query->row() as $row) {
                    $names = $this->db->query("SHOW COLUMNS FROM restoran.siparisler;");
                    $sutunlar = $names->result_array()[$i]["Field"];
                    if(!$row == "" && !$row == null){
                    ?>
                <tr>
                    <td><?php echo $sutunlar ?></td>
                    <td name="<?php echo $sutunlar ?>"><?php echo $row ?></td>
                </tr>
                <?php } $i++;} ?>
            </tbody>
        </table>
        <div class="linkler">
            <a href="<?php echo base_url(); ?>siparisguncelle/<?php echo $sorgu ?>">Update Offer</a>
            <a href="<?php echo base_url(); ?>hesapodendi/<?php echo $sorgu ?>">Payment Finished</a>
        </div>
    </div>
</body>
</html>

<?php

    include("footer.php");

?>