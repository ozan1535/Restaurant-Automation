<?php

    include("header.php");
    
    $query = $this->db->where("masa_adi", 2)->get('siparisler');
    //echo $query->row()->Lahmacun;
    // foreach ($query->result() as $row)
    // {
    //     echo $row->Lahmacun;
    // }
    $bugun = date("Y-m-d H:i:s",time()+60*60);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Ekranı</title>
    <style>
        .siparisal form{
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;    
            justify-content: space-evenly;
        }

        .siparisal h4 {
            text-align: center;
            margin-top: 30px;
            color: green;
            text-transform: uppercase;
        }
        table {
            margin: 15px auto;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px 10px;
            width: 600px;
        }

        table td {
            color: black;  
            text-align: center; 
        }

        table td a {
            text-decoration: none;
            color: rgb(23, 103, 203);
            background-color: white;
            padding: 3px 9px;
            border-radius: 10px;
            transition: 400ms;
        }

        table td a:hover {
            background-color: transparent;
        }

        table td input {
            width: 50px;
            height: 25px;
        }

        #sayi2 {
            text-align: center;
            margin: 10px;
            border: 1px solid green;
            width: 250px;
            margin: auto;
            padding: 5px 10px;
            font-size: 30px;
            border-radius: 30px;
        }

        input[type=submit]{
            width: 150px;
            height: 40px;
            border-radius: 30px;
            border: none;
            outline: none;
            cursor: pointer;
            margin: 10px auto;
            background-color: green;
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>
    
        <?php $iden =  $this->uri->segment(3);
              $msadi = $this->db->query("SELECT masa_adi FROM siparisler where id = $iden")->row();
              $ad = $msadi->masa_adi;
        ?>
    <div class="siparisal">
    <form action="<?php echo base_url() ?>siparisalindi" method="post" onsubmit="validateMyForm(event)">
    <div style="display:none;">
        <input type="text" name="masa_id" value="<?php echo $this->uri->segment(3) ?>">
    </div>
    <div>
            <p style="text-align:center; margin-top: 20px; font-size: 20px; color: green;">Masa Numarası: <?php echo $ad;?></p>
            <h4>Yiyecekler</h4>
            <table border="1">
                <thead>
                    <th>İsim</th>
                    <th>Fiyat</th>
                    <th>Birim/Porsiyon</th>
                </thead>
                <tbody>
                    <?php 
                        $query = $this->db->where("tur","yiyecek")->get("menu");
                        foreach($query->result() as $row){ 
                    ?>
                        <tr>
                            <td><?php $isim = $row->isim; echo $row->isim; ?></td>
                            <td><?php echo $row->fiyat; ?> TL</td>
                            <td><input value="<?php $query = $this->db->where("id", $iden)->get('siparisler');
                                echo $query->row()->$isim; ?>" class="birimler" id="urun<?php echo $row->id ?>" onkeyup="toplama()" type="number" name="<?php echo $row->isim?>"></td>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
            </div>
            <div>
            <h4>İçecekler</h4>
            <table border="1">
                <thead>
                    <th>İsim</th>
                    <th>Fiyat</th>
                    <th>Birim/Porsiyon</th>
                </thead>
                <tbody>
                    <?php 
                        $query = $this->db->where("tur","icecek")->get("menu");
                        foreach($query->result() as $row){ ?>
                        <tr>
                            <td><?php $isimler = $row->isim; echo $row->isim; ?></td>
                            <td><?php echo $row->fiyat; ?> TL</td>
                            <td><input value="<?php $query = $this->db->where("id", $iden)->get('siparisler');
                                echo $query->row()->$isimler; ?>" class="birimler" id="urun<?php echo $row->id ?>" onkeyup="toplama()" type="number" name="<?php echo $row->isim?>"></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
            </div>
            <div>
            <h4>Tatlılar</h4>
            <table border="1">
                <thead>
                    <th>İsim</th>
                    <th>Fiyat</th>
                    <th>Birim/Porsiyon</th>
                </thead>
                <tbody>
                    <?php
                        $query = $this->db->where("tur","tatli")->get("menu");
                        foreach($query->result() as $row){ ?>
                        <tr>
                            <td><?php $isimler = $row->isim; echo $row->isim; ?></td>
                            <td id="sea"><?php echo $row->fiyat; ?> TL</td>
                            <td><input value="<?php $query = $this->db->where("id", $iden)->get('siparisler');
                                echo $query->row()->$isimler; ?>" class="birimler" id="<?php echo $row->id ?>" onkeyup="toplama()" type="number" name="<?php echo $row->isim?>"></td>
                        </tr>
        
                    <?php } ?>
                    <tr>
                        <td>Fiyat</td>
                        <td></td>
                        <td><input type="text" id="para" name="fiyat" value=""></td>
                    </tr>
                    <tr style="display: none;">
                        <td>tarih</td>
                        <td></td>
                        <td><input type="text" name="tarih" value="<?php echo $bugun; ?>"></td> 
                    </tr>
                </tbody>
            </table>
            </div>
            <p id="sayi2">Toplam: <span id="sayi">0</span> TL</p>
            <input type="submit" value="Onayla">
    </form>
    </div>

    <script>
        function toplama() {
            var toplam = 0;
            var alinan = document.getElementsByClassName("birimler");

            for(var i = 0; i<alinan.length; i++){
                var sayi = Number(alinan[i].value);
                var kimlik = document.getElementsByClassName("birimler")[i].id;
                var simdiki = document.getElementById(kimlik).parentElement;
                var prev = simdiki.previousElementSibling.innerHTML;
                var yazdir = prev.slice(0, -3);
                var siparis = sayi * yazdir;
                toplam += siparis;
            }
            document.getElementById("sayi").innerHTML = toplam;
            document.getElementById("para").value = toplam;
        }

        function validateMyForm(e) {
            var durum = document.getElementById("durum").value;
            if(durum == "kapali")
            { 
                alert("İşlemi onaylamak için masa durumunu Açık hale getiriniz");
                e.preventDefault();
            }
        }
    </script>
</body>
</html>

<?php
    include("footer.php");

?>