<?php

    include("header.php");
    $i = 0;
    $masa = 0;
    $toplamKazanc = 0;
    $query = $this->db->query("SELECT * FROM tumveriler");  
    foreach ($query->result() as $sonuc) {
        if(date("Y-m-d") < $sonuc->tarih) {
            $masa++;
            $toplamKazanc += $sonuc->fiyat;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Günlük İstatistikler</title>
    <style>
        .istatistik {
            width: 100%;
            min-height: 80vh;
            height: auto;
        }

        .birles {
            display: flex;
        }

        .kazanc {
            width: 300px;
            height: 100px;
            background-color: rgb(73, 156, 189);
            border: 10px solid white;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            margin-left: 20px;
        }

        .kazanc p {
            font-size: 20px; 
        }

        .kazanc span {
            font-size: 25px;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 30px auto;
        }

        table tr th,td {
            padding: 3px;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="istatistik">
        <?php
            $names = $this->db->query("SHOW COLUMNS FROM restoran.tumveriler;");
            $sutunlar = $names->result_array()[1]["Field"];
        ?>
        <div class="birles">
            <div class="kazanc">
                <p>Your Total Earnings Today:</p>
                <span><?php echo $toplamKazanc; ?> TRY</span>
            </div>

            <div class="kazanc">
                <p>Total Table Today:</p>
                <span><?php echo $masa; ?> Table</span>
            </div>
        </div>
        <table border="1">
            <thead>
                <?php
                    $j= 0;
                    foreach ($query->row() as $row) {
                        $sutunlar = $names->result_array()[$j]["Field"]; ?>
                <th>
                    <?php echo $sutunlar; ?>
                </th>
                <?php $j++; }?>
            </thead>
            <tbody>
                <?php 
                foreach ($query->result() as $result) {
                    if(date("Y-m-d") < $result->tarih) {
                    ?>
                <tr>
                    <?php foreach ($result as $row) { ?>
                        <td><?php echo $row; ?></td>
                    <?php } ?>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php

    include("footer.php");

?>