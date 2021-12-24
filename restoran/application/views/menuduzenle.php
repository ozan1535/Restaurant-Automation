<?php
    include("header.php");
    $duzenle =  $this->uri->segment(3);
    $query = $this->db->where("id",$duzenle)->get("menu");
    $row = $query->row();
    $isim = $row->isim;
    $fiyat = $row->fiyat;    
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Düzenle</title>
    <style>
        .menuduzenle {
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

        input {
            width: 200px;
            height: 30px;
            border-radius: 20px;
            border: none;
            outline: none;
            text-indent: 10px;
            margin: 20px;
            font-size: 15px;
        }

        .onay {
           text-align: center;
        }

        .onay input{
            cursor: pointer;
            background-color: white;
            font-size: 20px;
            color: green;
            transition: 400ms;
        }

        .onay input:hover {
            background-color: transparent;
        }
    </style>
</head>
<body>
    <div class="menuduzenle">
        <form action="<?php echo base_url() ?>menuduzenlendi" method="get">
            <table>
                <thead>
                    <th>New Name</th>
                    <th>New Price</th>
                </thead>
                <tbody>
                    <tr>
                        <td style="display: none"><input type="text" name="numara" value="<?php echo $this->uri->segment(3); ?>"></td>
                        <td style="display: none"><input type="text" name="eskiisim" value="<?php echo $isim ?>"></td>
                        <td><input type="text" name="yeniisim" value="<?php echo $isim ?>"></td>
                        <td><input type="text" name="yenifiyat" value="<?php echo $fiyat ?>"></td>
                    </tr>
                    <tr>
                        <td class="onay" colspan="2"><input type="submit" value="Onayla"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    
</body>
</html>
<?php

    include("footer.php");

?>
