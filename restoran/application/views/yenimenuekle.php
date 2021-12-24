<?php

    include("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Ekle</title>
    <style>
        .menuekle {
            width: 100%;
            min-height: 80vh;
            height: auto;
            background-color: rgb(166, 194, 206);
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;    
        }

        .menuekle * {
            margin-bottom: 20px;
            font-family: Verdana;
            font-size: 19px;
        }

        .menuekle div h1 {
            text-align: center;
            margin-top: 30px;
            color: green;
        }

        .menuekle form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .menuekle select {
            width: 150px;
            outline: none;
            border: none;
            padding: 5px 10px;
            border-radius: 10px;
        }

        .menuekle input {
            width: 250px;
            padding: 5px 10px;
            border-radius: 10px;
            border: none;
            outline: none;
        }

        .menuekle input[type=submit] {
            cursor: pointer;    
        }

        .eklenmis .ayir{
            display: flex;
        }

        .eklenmis .ayir div {
            display: flex;
            flex-direction: column;
            margin-left: 30px;
        }

        .eklenmis h1 {
            margin-top: 20px;
        }

        .eklenmis h4 {
            text-align: center;
        }

        .eklenmis table {
            margin: 15px auto;
            
        }

        .eklenmis table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px 10px;
        }

        .eklenmis table td {
            color: black;   
        }

        .eklenmis table td a {
            text-decoration: none;
            color: rgb(23, 103, 203);
            background-color: white;
            padding: 3px 9px;
            border-radius: 10px;
            transition: 400ms;
        }

        .eklenmis table td a:hover {
            background-color: transparent;
        }


</style>
</head>
<body>
    
    <section class="menuekle">
        <div>
            <h1>Add a New Menu</h1>
            <form action="<?php echo base_url() ?>menueklendi" method="get">
                <label for="menu">Select the Data to be Entered as Food/Beverage</label>
                <select name="veriadi" id="menu">
                    <option value="yiyecek">Food</option>
                    <option value="icecek">Beverage</option>
                    <option value="tatli">Dessert</option>
                </select>
                <p>Write the Name of the Data to be Entered</p>
                <input type="text" name="urun" placeholder="İsim Giriniz">
                <p>Enter Unit/Portion Price</p>
                <input type="text" name="fiyat" placeholder="Fiyat Giriniz">
                <input type="submit" value="Onayla">
            </form>
        </div>
        <div class="eklenmis">
        <div>
        <h1>Added Food and Beverage List</h1>
        </div>
        <div class="ayir">
            <div>
            <h4>Food</h4>
            <table border="1">
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    <?php 
                        $query = $this->db->where("tur","yiyecek")->get("menu");
                        foreach($query->result() as $row){ ?>
                        <tr>
                            <td><?php echo $row->isim; ?></td>
                            <td><?php echo $row->fiyat; ?> TL</td>
                            <td><a href="<?php echo base_url()?>menuduzenle/<?php echo $row->id?>">Edit</a></td>
                            <td><a href="<?php echo base_url()?>menusil/<?php echo $row->id?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
            </div>
            <div>
            <h4>Beverage</h4>
            <table border="1">
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    <?php 
                        $query = $this->db->where("tur","icecek")->get("menu");
                        foreach($query->result() as $row){ ?>
                        <tr>
                            <td><?php echo $row->isim; ?></td>
                            <td><?php echo $row->fiyat; ?> TL</td>
                            <td><a href="<?php echo base_url()?>menuduzenle/<?php echo $row->id?>">Edit</a></td>
                            <td><a href="<?php echo base_url()?>menusil/<?php echo $row->id?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
            </div>
            <div>
            <h4>Desserts</h4>
            <table border="1">
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    <?php 
                        $query = $this->db->where("tur","tatli")->get("menu");
                        foreach($query->result() as $row){ ?>
                        <tr>
                            <td><?php echo $row->isim; ?></td>
                            <td><?php echo $row->fiyat; ?> TL</td>
                            <td><a href="<?php echo base_url()?>menuduzenle/<?php echo $row->id?>">Edit</a></td>
                            <td><a href="<?php echo base_url()?>menusil/<?php echo $row->id?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </section>

</body>
</html>


<?php

    include("footer.php");

?>