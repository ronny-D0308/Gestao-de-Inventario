<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "gestaodeInventario";

    $conn = new mysqli( $servername, $username, $password, $bdname);

    if($conn->connect_error) {
        die("Erro na conexão". $conn->connect_error);
    }

    $sql = "SELECT id, nome, quantidade, preco FROM estoque";
    $result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gerenciamento de Inventário </title>

    <style>
        *{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        body{
            margin: 0;
            padding: 0;
        }
        header{
            display:flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            height: 50px;
            color: #fff;
            margin-bottom: 40px;
        }
        .conteiner-h1{
            margin: 0 auto; 
        }
        .conteiner-PDV{
            margin: 0 auto;
            width:600px;
            height:auto;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        .buscar-RED{
            background-color: red;
            border: 2px solid gray;
            height: 200px;
            width: 200px;
        }
        .buscar-BLUE{
            background-color: blue;
            border: 2px solid gray;
            height: 200px;
            width: 200px;
        }
        .buscar-YELLOW{
            background-color: yellow;
            border: 2px solid gray;
            height: 200px;
            width: 200px;
        }
        .buscar-GREEN{
            background-color: green;
            border: 2px solid gray;
            height: 200px;
            width: 200px;
        }
        .buscar-RED:hover{
            opacity: 50%;
            transition: 0.4s;
            padding: 20px 20px;
        }
        .buscar-BLUE:hover{
            opacity: 50%;
            transition: 0.4s;
            padding: 20px 20px;
        }
        .buscar-YELLOW:hover{
            opacity: 50%;
            transition: 0.4s;
            padding: 20px 20px;
        }
        .buscar-GREEN:hover{
            opacity: 50%;
            transition: 0.4s;
            padding: 20px 20px;
        }

    </style>
</head>
<body>
    <header>
        <div class="conteiner-h1">
            <h1 class="title"> Ponto de Venda </h1>
        </div>
    </header>

    <div class="conteiner-PDV">
        <div class="buscar-RED">

        </div>

        <div class="buscar-BLUE">
            
        </div>

        <div class="buscar-YELLOW" >
            
        </div>

        <div class="buscar-GREEN" >
            
        </div>
    </div>

    <input type="text" id="nome" >
    <input type="submit">       
    <span> <p id="result"> </p> </span>
    
    <script>
        var nome = document.getElementById('nome');
        if(nome == 'joão') {
            document.getElementById('result').innerHTML = "vc esta crt";
        }
    </script>
</body>
</html>