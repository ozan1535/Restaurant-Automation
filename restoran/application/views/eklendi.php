<?php include("header.php"); 

$table_name = $this->input->get("masaisim");

$data = array('masa_adi' => $table_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Var Olan Masalar</title>
    <style>

        .bilgi {
            width: 100%;
            min-height: 80vh;
            height: auto;
            background-color: rgb(166, 194, 206);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            flex-wrap: wrap;
        }

        .information {
            font-size: 30px;
            color: #ea4e1b;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .bilgi .newtable {
            margin-bottom: 20px;
            text-decoration: none;
            font-size: 20px;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            transition: 400ms;
            color: green;
        }

        .bilgi .newtable:hover {
            background-color: transparent;
        }

    </style>
</head>
<body>
    <section class="bilgi">
        <P class="information"><?php
            if($table_name == ""){
                echo "This section cannot be blank";
            }
            else if($this->db->insert('masa', $data)){
                $this->db->insert('siparisler', $data);
                echo "The Table is Added";
            }
            else {
                echo "There is something wrong";
            }
        ?>
        </p>
        <a class="newtable" href="<?php echo base_url() ?>masaekle">Add New Table</a>
    </section>
</body>
</html>

<?php include("footer.php"); ?>