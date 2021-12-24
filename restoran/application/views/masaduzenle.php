<?php
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masa Düzenle</title>
    <style>
        .masaekle {
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

        .eklemeislemi {
            width: 300px;
            height: 180px;
            background-color: rgb(73, 156, 189);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin-top: 30px;
        }

        .eklemeislemi form {
            text-align: center;
        }

        .eklemeislemi form p {
            font-size: 20px;
            margin-bottom: 20px;
            color: white;
        }

        .eklemeislemi form input {
            height: 30px;
            border: none;
            border-radius: 20px;
            outline: none;
            text-indent: 10px;
            font-size: 15px;
        }

        .eklemeislemi form button {
            margin-top: 20px;
            width: 100px;
            height: 30px;
            border-radius: 20px;
            border: none;
            outline: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <section class="masaekle">
        <div class="eklemeislemi">
            <form action="<?php echo base_url() ?>masaduzenlendi" method="GET">
                <p>Masa Ekle</p>
                <input style="display:none;" type="text" name="id" value="<?php $query = $this->db->where('id', $this->uri->segment(3))->get("masa")->row(); 
                    echo $query->id;
                ?>">
                <input type="text" name="masayeniisim" value="<?php $query = $this->db->where('id', $this->uri->segment(3))->get("masa")->row(); 
                    echo $query->masa_adi;
                ?>"><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>
<?php   include("footer.php"); ?>
