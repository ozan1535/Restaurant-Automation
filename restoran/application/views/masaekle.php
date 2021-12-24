<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masa Ekle</title>
    <style>
        <?php include("masaekle.css"); ?>
        .addedtables {
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .addedtables table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
        }

        .addedtables th, td {
            padding: 10px 15px;
            font-size: 20px;
        }

        .addedtables .setting {
            text-decoration: none;
            color: black;
            background-color: white;
            padding: 3px;
            border-radius: 5px;
            transition: 400ms;
        }

        .addedtables .setting:hover {
            background-color: transparent;
        }
    </style>
</head>
<body>

    <section class="masaekle">
        <div class="eklemeislemi">
            <form action="<?php echo base_url() ?>eklendi" method="GET">
                <p>Masa Ekle</p>
                <input type="text" name="masaisim" placeholder="Masa Adını Giriniz"><br>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="addedtables">
            <table border="1">
                <thead>
                    <th colspan="4">Added Tables</th>
                </thead>
                <tbody>
                    <?php 

                    $query = $this->db->order_by('masa_adi', 'ASC')->get("masa");
                    foreach($query->result() as $row){
                        ?>
                    <tr>
                    
                        <td><?php echo $row->masa_adi ?></td>
                        <td><a class="setting" href="<?php echo base_url() ?>masaduzenle/<?php echo $row->id ?>">Edit</a></td>
                        <td><a class="setting" href="<?php echo base_url() ?>masasil/<?php echo $row->id ?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    
</body>
</html>