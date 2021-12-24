<?php

    include("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap Makinesi</title>
    <style>

        * {
            font-family: Helvetica;
        }

        .container {
            width: 100%;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container .makine {
            width: 400px;
            height: 600px;
            display: flex;
            flex-direction: column;
        }

        .container .makine .ekran {
            width: 100%;
            height: 100px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background-color: #1c1c1c;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            color: white;
            font-size: 50px;
        }

        .container .makine .ekran span {
            margin-right: 20px;
        }

        .container .makine .tuslar {
            width: 100%;
            height: 500px;
            background-color: #1c1c1c;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .container .makine .tuslar div {
            width: 70px;
            height: 70px;
            background-color: #505050;
            border-radius: 50%;
            margin: 10px;
            text-transform: uppercase;
            text-align: center;
            line-height: 70px;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }

        .container .makine .tuslar div:hover {
            opacity: 0.8;
        }

        .container .makine .tuslar .ilkuc {
            background-color: #d4d4d2;
            color: black;
        }

        .container .makine .tuslar div:nth-child(4n) {
            background-color: orange;
        }

        .container .makine .tuslar .orange {
            background-color: orange;
        }

        .container .makine .tuslar .basis{
            flex-basis: 165px;
            border-radius: 50px;
            text-align: start;
            text-indent: 20px;
        }
        

    </style>
</head>
<body>
    <div class="container">
        <div class="makine">
            <div class="ekran">
                <span id="sonuc"></span>
            </div>
            <div class="tuslar">
                <div class="ilkuc" onclick="sil()">ac</div>
                <div class="ilkuc" onclick="degis()">+/-</div>
                <div class="ilkuc" onclick="yuzebol()">%</div>
                <div class="orange" onclick="sayi('/')">/</div>
                <div onclick="sayi(7)">7</div>
                <div onclick="sayi(8)">8</div>
                <div onclick="sayi(9)">9</div>
                <div class="orange" onclick="sayi('*')">*</div>
                <div onclick="sayi(4)">4</div>
                <div onclick="sayi(5)">5</div>
                <div onclick="sayi(6)">6</div>
                <div class="orange" onclick="sayi('-')">-</div>
                <div onclick="sayi(1)">1</div>
                <div onclick="sayi(2)">2</div>
                <div onclick="sayi(3)">3</div>
                <div class="orange" onclick="sayi('+')">+</div>
                <div class="basis" onclick="sayi(0)">0</div>
                <div onclick="sayi('.')">.</div>
                <div class="orange" onclick="equals()">=</div>
            </div>
        </div>
    </div>

    <script>

        var sonuc = document.getElementById("sonuc");
        sonuc.innerHTML = 0;
        var dogru = false;
        var yanlis = true;
        var virgul = false;
        var eksi = true;
        var bireksi = true;
        var islemler = false ;

        sayi = function(value) {
            if(value == "+" || value == "/" || value == "*" || value == "-"){
                virgul = false;
                yazi = sonuc.innerHTML;

                if(islemler){
                    if((yazi.substring(yazi.length - 1) == "+") || (yazi.substring(yazi.length - 1) == "/") || (yazi.substring(yazi.length - 1) == "*") || (yazi.substring(yazi.length - 1) == "-")){
                        tekrar = yazi.substring(0, yazi.length - 1);
                        sonuc.innerHTML = tekrar;
                    }
                }
                islemler = true;
            }

            if((dogru || value == ".")){

                    if(virgul && value == "."){
                        value = "";
                        sonuc.innerHTML += value;
                        yanlis = false;
                        dogru = true;
                    }
                    else{
                        sonuc.innerHTML += value;
                        yanlis = false;
                        dogru = true;
                    }
            }
            if(yanlis){
                if(value !== '.' && (sonuc.innerHTML[0] == 0 || sonuc.innerHTML[0] == '-')){
                    if(sonuc.innerHTML !== '-'){
                        sonuc.innerHTML = "";
                        sonuc.innerHTML +=value;
                        dogru = true;
                        yanlis = false;
                    }
                    else {
                        value = "";
                        sonuc.innerHTML +=value;
                        dogru = true;
                        yanlis = false;
                    }
                }
            }
            
            if(sonuc.innerHTML[0] == 0 && sonuc.innerHTML[1] == 0){
                sonuc.innerHTML = 0;
            }
            if(value == "."){
                virgul = true;
            }
        }
    
        sil = function() {
            sonuc.innerHTML = 0;
            dogru = false;
            yanlis = true;
            virgul = false;
            eksi = true;
            bireksif = true;
        }

        degis = function() {
            if(eksi){
                if(bireksi){
                    sonuc.innerHTML = "-" + sonuc.innerHTML;
                    bireksi = false;
                }
                if(sonuc.innerHTML[1] == 0){
                    sonuc.innerHTML = "-";
                }
                var b = sonuc.innerHTML;
                b.substring(1);
                sonuc.innerHTML = "-" + b.substring(1);
                eksi = false;
            }
            else{
                console.log(sonuc.innerHTML[0]);
                var a = sonuc.innerHTML;
                a.substring(1);
                sonuc.innerHTML = " " + a.substring(1);
                eksi = true;
            }
        }

        yuzebol = function() {
            var result = 0;
            result = sonuc.innerHTML / 100;
            sonuc.innerHTML = result;
        }

        equals = function() {
            var islem = eval(sonuc.innerHTML);
            sonuc.innerHTML = islem;
            islemler = false;
        }

    </script>
</body>
</html>
<?php

    include("footer.php");
?>