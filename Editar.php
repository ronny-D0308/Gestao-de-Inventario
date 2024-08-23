<?php
   include('configPHP.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>

    <style>
        *{
            margin:0;
            padding:0;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
        a{
            color: white;
            text-decoration: none;
        }
        .conteiner-form {
            margin:0 auto;
            padding: 10px 10px;
            width: 600px;
            height: auto;
            background-color:#333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
        .title{
            color: #fff;
            margin-bottom: 20px;
            text-decoration: none;
        }
        .conteiner-campos{
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
        }
        label{
            color:#fff;
            margin: 10px 0;
        }
        .campos{
            padding-left: 5px;
            width: 250px;
            height: 30px;
            font-size: 20px;
            outline: none;
            border: none;
            border-radius: 3px;
        }
        .butao-enviar {
            margin: 20px 0;
            width: 90px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color:white;
            cursor: pointer;
        }
        .table {
            margin: 0 auto;
            width: 600px;
            text-align: center;
            color:#fff;
        }
        #categoria {
            width: 150px;
            height: 40px;
            outline:none;
        }
        .acoes {
            color:#fff;
            font-size: 25px;
            text-decoration: none;
        }
        .conteiner-edit{
            margin:0 auto;
            padding: 10px 10px;
            width: 600px;
            height: auto;
            background-color:#333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
        section{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 600px;
        }
    </style>
</head>
<body>
    <header>
       <div class="conteiner-h1">
            <a href="index.php"> <h1 class="title"> Gestão de Inventário </h1> </a>
        </div>
    </header>



<section>
    <div class="conteiner-form">
        <h1 class="title"> Editar produto do Estoque </h1>

        <form action="" method="post" class="conteiner-campos">
                <label> Nome do produto: </label>
                <input type="text" name="nome_produto" class="campos">
            
                <input type="submit" class="butao-enviar" name="enviar" value="Buscar">
        </form> 
        
        <div class="container-tabela">
        <table class="table" id="tabela">
           
            <tbody>
                <?php
                if(isset($_POST['nome_produto'])) {
                    $nome_produto = $_POST['nome_produto'];
                

                $sql = "SELECT id, nome, quantidade, preco, data_venci, categoria, codigo_produto FROM produto WHERE nome LIKE '%$nome_produto%' ";
                $result = $conn->query($sql); 


                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['nome']."</td>";
                            echo "<td>".$row['quantidade']."</td>";
                            echo "<td>".$row['preco']."</td>";
                            echo "<td>".$row['data_venci']."</td>";
                            echo "<td>".$row['categoria']."</td>";
                            echo "<td>".$row['codigo_produto']."</td>";
                            echo "<td>
                                    <a class='acoes' id='Editar' href='phpEdit.php?id=$row[id]' title='Editar'> &#10000 </a>
                                </td></tr>";
                            }
                    } else {
                            echo "<tr><td> 0 resultados </td></tr>";
                    }
                }
                    $conn->close();

                ?>
            </tbody>
        </table>
    </div>

    </div> 

</section>
</body>
</html>
