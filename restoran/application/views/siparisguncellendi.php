<?php
  error_reporting(0);
  ini_set('display_errors', 0);
    include("header.php");

    $ucret = $this->input->post("fiyat");
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
        .siparisler {
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

        .siparislistesi {
          color: green;
          font-size: 20px;
        }

        table, th, td{
          border: 1px solid black;
          border-collapse: collapse;
          text-align: center;
          padding: 10px;
          font-size: 20px;
          width: 400px;
        }

        tbody tr:last-child{
          display: none;
        }

        tbody tr:nth-child(1) a {
          display: none;
        }

        .ucret,.verilen {
          font-size: 30px;
          margin-top: 30px;
          margin-bottom: 30px;
          padding: 10px 15px;
          background-color: white;
          color: green;
          border-radius: 25px;

        }
      </style>
    </head>
    <body>
      <div class="siparisler"> 
      <p class="verilen">Güncel Sipariş</p> 
    <table border="1">
      <thead>
        <th>Siparişler</th>
        <th>Birim/Porsiyon</th>
      </thead>
      <tbody>
      <?php
        $ad = $this->uri->segment(3);
        foreach($this->input->post() as $key => $val)
        {
            if(!$val == 0){
              echo "<tr>
              <td> $key </td>
              <td> $val </td>
              <td><a href='#'>Düzenle</a></td>
              <td><a href='#'>Sil</a></td>
              </tr>";
  }
  $data = array(
    $key => $val
 );

 $fiyat = array(
  "fiyat" => $ucret
 );
 $this->db->where('masa_adi', $ad);
 $this->db->update('siparisler', $data);

//  $this->db->where('masa_adi', $ad);
//  $this->db->update('siparisler', );
} 

?>
      </tbody>
    </table>
    <p class="ucret">Total: <span><?php echo $ucret ?> TRY</span></p>
</div>
    </body>
    </html>
<?php
echo $this->input->post("selam");
include("footer.php");

?>