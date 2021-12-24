<?php

    include("header.php");
    $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veritabanı</title>
    <style>
        .container {
            min-height: 80vh;
            height: auto;
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
<div class="container">
<?php
            
            $query = $this->db->query("SELECT * FROM tumveriler");
            $names = $this->db->query("SHOW COLUMNS FROM restoran.tumveriler;");
            $sutunlar = $names->result_array()[1]["Field"];
        ?>
        <table border="1">
            <thead>
            <?php
                $j= 0;
                foreach ($query->row() as $row) {
                    $sutunlar = $names->result_array()[$j]["Field"]; ?>
                <th>
                     <?php echo $sutunlar ?>
                </th>
                <?php
                $j++;
            }?>
            </thead>
            <tbody>
                <?php foreach ($query->result() as $result) { ?>
                <tr>
                    <?php foreach ($result as $row) { ?>
                        <td><?php echo $row; ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
                <?php?>
            </tbody>
        </table>
</div>
</body>
</html>

<?php

    include("footer.php");

?>